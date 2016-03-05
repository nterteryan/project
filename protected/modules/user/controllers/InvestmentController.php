<?php

/**
 * InvestmentController
 *
 * @author Hovo G.
 * @created at 2th day of March 2016
 */
class InvestmentController extends Controller
{
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            //'postOnly',
        );
    }


    /**
     * Action Index
     * list Investment (Tariff)
     *
     * @author Hovo G.
     * @created at 2th day of March 2016
     * @param null
     * @return void
     */
    public function actionIndex()
    {
        $tariffs = Tariff::getTariffList(array("status" => "ACTIVE"));
        $userCertificate = new UserCertificate;
        $this->render("index", array(
            'tariffs' => $tariffs,
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
    public function actionAddUser(){
        $request =  Yii::app()->request;
        if (!$request->isAjaxRequest) {
            $this->send304();
            return false;
        }
        $tariff_id = $request->getpost('id');
        $amount = $request->getpost('amount');
        $pin = $request->getpost('pin');
        $percent = $request->getpost('percent');
        $close_month = $request->getpost('close_month');
        $isAmountEnough = $this->isAmountEnough($amount);
        $isPinValid = $this->isPinValid($pin);
        if(!$isPinValid){
            $response = array(
                'success' => 0,
                'error' => "pin is inValid!!!"
            );
            echo json_encode($response);
            Yii::app()->end();
        }elseif(!$isAmountEnough){
            $response = array(
                'success' => 0,
                'amountAdd' => 1,
                'error' => "you  Amount is not Enough!!!"
            );
            echo json_encode($response);
            Yii::app()->end();
        }
        $data = array(
            'tariff_id'=>$tariff_id,
            'amount'=>$amount,
            'percent'=>$percent,
            'close_month'=>$close_month,
        );
        $tariff = $this->tariffSave($data);
        $user = User::getCurrentUser();
        if(empty($tariff["error"])){
            $user->amount = $user->amount-$amount;
            $user->update();
            $this->transactionSave($amount);
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
     * isAmountEnough
     * is Amount Enough (user)
     *
     * @author Hovo G.
     * @created at 3th day of March 2016
     * @param $amount (int)
     * @return boolean
     */
    private function isAmountEnough($amount){
        $user = User::getCurrentUser();
        $isAmountEnough = $user->isAmountEnough($amount);
        if(!$isAmountEnough)
            return  false;
        return  true;
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
    private function isPinValid($pin){
        $user = User::getCurrentUser();
        $isPinValid = $user->isPinValid($pin);
        if(!$isPinValid)
            return  false;
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
    private function  tariffSave($data){
        $model = new UserTariff();

        $model->tariff_id =  $data["tariff_id"];
        $model->amount    =  $data["amount"];
        $model->percent   =  $data["percent"];
        $model->close_month   =  $data["close_month"];
        $model->user_id   =  Yii::app()->user->id;
        $model->validate();
        if ($model->hasErrors()) {
            $response = array(
                'success' => 0,
                'error' => $model->getErrors()
            );
            return  $response;
        }else{
            $model->save();
            $response = array(
                'success' => 1,
                'error' => 0
            );
        }
        return $response ;
    }
    /**
     * TransactionSave
     * Transaction Save (UserTransaction)
     *
     * @author Hovo G.
     * @created at 3th day of March 2016
     * @param $amount (int)
     * @return array
     */
    private function  transactionSave($amount){
        $model = new UserTransaction();
        $model->sender_id =  Yii::app()->user->id;
        $model->transaction_type =  UserTransaction::TYPE_INVESTMANT;
        $model->account_type = "AMOUNT";
        $model->amount = $amount;
        $model->validate();
        if ($model->hasErrors()) {
            $response = array(
                'success' => 0,
                'error' => $model->getErrors()
            );
            return  $response;
        }else{
            $model->save();
            $response = array(
                'success' => 1,
                'error' => 0
            );
        }
        return $response ;
    }



    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow all users to perform 'index' actions
                'actions' => array(
                    'index',
                    'addUser',
                ),
                'roles' => array(User::ROLE_USER),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
}