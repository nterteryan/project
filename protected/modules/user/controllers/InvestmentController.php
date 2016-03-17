<?php

/**
 * InvestmentController
 *
 * @author Hovo G.
 * @created at 2th day of March 2016
 */
class InvestmentController extends Controller {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
                //'postOnly',
        );
    }

    /**
     * 
     * Action Index
     * list Investment (Tariff)
     *
     * @author Hovo G.
     * @created at 2th day of March 2016
     * @param null
     * @return void
     */
    public function actionIndex() {
        $clientScript = Yii::app()->getClientScript();
        $clientScript->registerScriptFile(APP_BASE_URL . '/js/ajax_handler.js');
        $clientScript->registerScriptFile(APP_BASE_URL . '/js/main_helper.js');
        $clientScript->registerScriptFile(USER_MODULE_ASSETS_URL . '/js/investment/event_handlers.js');
        $clientScript->registerScriptFile(USER_MODULE_ASSETS_URL . '/js/investment/event_listeners.js');
        $currentUser = User::getCurrentUser();
        $userTariff = UserTariff::getUserTariffList();
        $arrayDataProvider = new CArrayDataProvider($userTariff, array(
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));
        $this->render("index", array(
            'tariffs' => Tariff::getTariffList(array("status" => "ACTIVE")),
            'userType' => $currentUser->type,
            'arrayDataProvider' => $arrayDataProvider,
        ));
    }

    /**
     * Action AddUser
     * add Investment user (user Tariff)
     *
     * @author Hovo G.
     * @created at 2th day of March 2016
     * @param null
     * @return void
     */
    public function actionAddUser() {
        $request = Yii::app()->request;
        if (!$request->isAjaxRequest) {
            $this->send304();
            return false;
        }
        $tariffId = $request->getpost('id');
        $pin      = $request->getpost('pin');
        $tariff   = Tariff::model()->findByPk($tariffId);
        if (!$tariff instanceof Tariff) {
            $response = array(
                'success' => 0,
                'error'   => User::ERROR_FROM_USER,
            );
            echo json_encode($response);
            Yii::app()->end();
        }

        $currentUser    = User::getCurrentUser();
        $amount         = $tariff->amount;
        $percent        = $tariff->getPercentageByUserType($currentUser->type);
        $close_month    = $tariff->close_month;
        $isAmountEnough = $this->isAmountEnough($amount);
        if (!$currentUser->isPinValid($pin)) {
            $response = array(
                'success' => 0,
                'error' => User::ERROR_INVALID_PIN_CODE,
            );
            echo json_encode($response);
            Yii::app()->end();
        }
        if (!$currentUser->isAmountEnough($price)) {
            $response = array(
                'success' => 0,
                'amountAdd' => 1,
                'error' => User::ERROR_NOT_ENOUGH_AMOUNT,
            );
            echo json_encode($response);
            Yii::app()->end();
        }
        $data = array(
            'tariff_id'   => $tariffId,
            'amount'      => $amount,
            'percent'     => $percent,
            'close_month' => $close_month,
        );
        $tariffUserId = $this->tariffSave($data);
        if (empty($tariffUserId["error"])) {
            $model = new UserTransactions();
            $currentUser->amount = $currentUser->amount - $amount;
            $currentUser->update();
            $data = array(
                "amount"              => $amount,
                "tariff_id"           => $tariffId,
                "transaction_type"    => "tariff",
                "transaction_type_id" => $tariffUserId,
                "type_tr"             => UserTransactions::TYPE_INVESTMANT,
            );
            $this->transactionSave($data);
            $response = array(
                'success' => 1,
                'error' => 0
            );
            echo json_encode($response);
            Yii::app()->end();
        }
        echo json_encode($tariff["error"][0]);
        Yii::app()->end();
    }

    /**
     * sendPercent
     * sendPercent
     *
     * @author Hovo G.
     * @created at 14th day of March 2016
     * @return json
     */
    public function actionSendPercent() {
        $request = Yii::app()->request;
        if (!$request->isAjaxRequest) {
            throw new CHttpException(404, 'Указанная запись не найдена');
            return false;
        }
        $id = $request->getpost('id');
        $userTariff = UserTariff::model()->findByPk($id);
        $lookingDay = DateComponent::lookingDay("Mon");
        if (empty($userTariff) || $lookingDay == false || $userTariff->amount_percent == 0) {
            throw new CHttpException(404, 'Указанная запись не найдена');
            return false;
        }
        $user = User::getCurrentUser();
        $user->amount = $user->amount + $userTariff->amount_percent;
        $user->update();
        $userTariff->amount_percent = 0;
        $userTariff->update();
        $data = array("amount" => $user->amount, "tariff_id" => $userTariff->id);
        $data = array(
            "amount"              => $userTariff->amount_percent,
            "transaction_type"    => "tariff",
            "transaction_type_id" => $userTariff->id,
            "type_tr"             => UserTransactions::TYPE_INVESTMANT,
        );
        $this->transactionSave($data, false);
        echo json_encode(array("success" => 1));
        Yii::app()->end();
    }    
    /**
     * sendRefund
     * sendRefund
     *
     * @author Hovo G.
     * @created at 14th day of March 2016
     * @return json
     */
    public function actionSendRefund() {
        $request = Yii::app()->request;
        if (!$request->isAjaxRequest) {
            throw new CHttpException(404, 'Указанная запись не найдена');
        }
        $id  = $request->getpost('id');
        $userTariff = UserTariff::model()->findByPk($id);
        if (empty($userTariff) ||  $userTariff->amount_percent == 0) {
            throw new CHttpException(404, 'Указанная запись не найдена');
            return false;
        }
        $userTariff->status      = "REFUND";
        $userTariff->refund_date = new CDbExpression("now()");
        $userTariff->update();
        echo json_encode(array("success" => 1));
        Yii::app()->end();
    }

    /**
     * isAmountEnough
     * is Amount Enough (user)
     *
     * @author Hovo G.
     * @created at 3th day of March 2016
     * @param $amount (int)
     * @return boolean
     */
    private function isAmountEnough($amount) {
        $user = User::getCurrentUser();
        $isAmountEnough = $user->isAmountEnough($amount);
        if (!$isAmountEnough)
            return false;
        return true;
    }

    /**
     * isPinValid
     * is Pin Valid(user)
     *
     * @author Hovo G.
     * @created at 3th day of March 2016
     * @param $pin (int)
     * @return boolean
     */
    private function isPinValid($pin) {
        $user = User::getCurrentUser();
        $isPinValid = $user->isPinValid($pin);
        if (!$isPinValid)
            return false;
        return true;
    }

    /**
     * tariffSave
     * tariff Save(UserTariff)
     *
     * @author Hovo G.
     * @created at 3th day of March 2016
     * @param $data (array)
     * @return array
     */
    private function tariffSave($data) {
        $model = new UserTariff();

        $model->tariff_id   = $data["tariff_id"];
        $model->amount      = $data["amount"];
        $model->percent     = $data["percent"];
        $model->close_month = $data["close_month"];
        $model->user_id     = Yii::app()->user->id;
        $model->validate();
        if ($model->hasErrors()) {
            $response = array(
                'success' => 0,
                'error' => $model->getErrors()
            );
            return $response;
        } else {
            $model->save();
            return $model->id;
        }
        return $response;
    }

    /**
     * Paiding
     * Paiding ()
     *
     * @author Hovo G.
     * @created at 7th day of March 2016
     * @param $amount (int)
     * @return array
     */
    public function actionPaiding() {
        $request = Yii::app()->request;
        if (!$request->isAjaxRequest) {
            throw new CHttpException(404, 'Указанная запись не найдена');
            return false;
        }
        $id         = $request->getpost('closedTariffId');
        $model      = new UserTariff();
        $userTariff = UserTariff::model()->findByPk($id);
        $time       = strtotime($userTariff->created_date);
        $fina       = date("Y-m-d", strtotime("+ " . $userTariff->close_month . " month", $time));
        $fina       = strtotime($fina);
        if ($fina < strtotime(date("Y-m-d"))) {
            $userTariff->status = "PAID";
            $userTariff->update();
            $user = User::getCurrentUser();
            $user->amount = $user->amount + $userTariff->amount_percent + $userTariff->amount;
            $user->update();
            $data = array("amount" => $user->amount, "tariff_id" => $userTariff->id);
            $data = array(
                "amount" => $user->amount,
                "transaction_type" => "tariff",
                "transaction_type_id" => $userTariff->id,
                "type_tr" => UserTransactions::TYPE_INVESTMANT,
            );
            $this->transactionSave($data, false);
            echo json_encode(array("success" => 1));
            die;
        } else {
            throw new CHttpException(404, 'Указанная запись не найдена');
            return false;
        }
        return $response;
    }

    /*
     * TransactionSave
     * Transaction Save (UserTransactions)
     *
     * @author Hovo G.
     * @created at 3th day of March 2016
     * @param $amount (int)
     * @return array
     */
    private function transactionSave($data, $type = true) {
        $model = new UserTransactions();
        $amount = $data["amount"];
        $transaction_type = $data["transaction_type"];
        $transaction_type_id = $data["transaction_type_id"];
        $type_tr = $data["type_tr"];
        if ($type) {
            $model->sender_id = Yii::app()->user->id;
            $model->amount_type = "INCOME";
        } else {
            $model->receiver_id = Yii::app()->user->id;
            $model->amount_type = "OUTCOME";
        }
        $model->transaction_type = $transaction_type;
        $model->type = $type_tr;
        $model->account_type = "AMOUNT";
        $model->amount = $amount;
        $model->transaction_type_id = $transaction_type_id;
        $model->validate();
        if ($model->hasErrors()) {
            $response = array(
                'success' => 0,
                'error' => $model->getErrors()
            );
            return $response;
        } else {
            $model->save();
        }
        // return $response;
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' actions
                'actions' => array(
                    'index',
                    'addUser',
                    'sendPercent',
                    'SendRefund',
                    'paiding',
                ),
                'roles' => array(User::ROLE_USER),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
}