<?php

/**
 * DashboardController 
 *
 * @author Narek T.
 * @created at 23th day of Jan 2016
 */
class ProfileController extends Controller {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + pin, premium',
        );
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
                    'changePassword',
                    'premium',
                    'pin',
                ),
                'roles' => array(User::ROLE_USER),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Make user account premium
     *
     * @author Hovo G.
     * @created at 11th day of March 2016
     * @updated at 12th day of March by Narek T.
     * @return jsone
     */
    public function actionPremium() {
        $request = Yii::app()->request;
        $premiumPackageId = $request->getpost("id");
        $pin = $request->getpost("pin");
        $auto = $request->getpost("auto");
        // Try to find premium package with id
        $premiumPackage = PremiumPackage::model()->findByPk($premiumPackageId);
        if (!$premiumPackage instanceof PremiumPackage) {
            $response = array(
                'success' => 0,
                'error'   => User::ERROR_FROM_USER,
            );
            echo json_encode($response);
            Yii::app()->end();
        }
        $month = $premiumPackage->close_month;
        $price = $premiumPackage->price;
        $currentUser = User::getCurrentUser();
        // Check if pin code not valide
        if (!$currentUser->isPinValid($pin)) {
            $response = array(
                'success' => 0,
                'error'   => User::ERROR_INVALID_PIN_CODE,
            );
            echo json_encode($response);
            Yii::app()->end();
        }
        // Check if current user havent enough money in balance
        if (!$currentUser->isAmountEnough($price)) {
            $response = array(
                'success'   => 0,
                'amountAdd' => 1,
                'error'     => User::ERROR_NOT_ENOUGH_AMOUNT,
            );
            echo json_encode($response);
            Yii::app()->end();
        }
        // Discount from user amount and mark user as premium
        $currentUser->discount($price);
        $currentUser->markAsPremium();
        // Create user premium relation
        $premium = new UserPremium();
        $premium->user_id = $currentUser->id;
        $premium->premium_id = $premiumPackageId;
        $premium->auto_bil = $auto;
        $premium->save();
        $response = array(
            'success' => 1,
            'amountAdd' => 0,
            'error' => 0
        );
        echo json_encode($response);
        Yii::app()->end();
        
    }

    /**
     * Action Index 
     *
     * @author Narek T.
     * @created at 23th day of Jan 2016
     */
    public function actionIndex() {
        // Get client sript objetc
        $clientScript = Yii::app()->getClientScript();
        $clientScript->registerScriptFile(APP_BASE_URL . '/js/ajax_handler.js');
        $clientScript->registerScriptFile(APP_BASE_URL . '/js/main_helper.js');
        $clientScript->registerScriptFile(USER_MODULE_ASSETS_URL . '/js/profile/event_handlers.js');
        $clientScript->registerScriptFile(USER_MODULE_ASSETS_URL . '/js/profile/event_listeners.js');
        $model = User::getCurrentUser();
        $premiumPackage = PremiumPackage::model()->active()->findAll();
        $images_model = new UserImage();
        if (!empty($_POST["UserImage"])) {
            $uploadedFile = CUploadedFile::getInstance($images_model, "image");
            $fileName = "user-image-" . time() . "." . $uploadedFile->getExtensionName();
            $images_model->image = $fileName;
            $images_model->user_id = Yii::app()->user->id;
            $images_model->validate();
            if (!$images_model->hasErrors()) {
                $this->changeUserImageStatus();
            }

            if ($images_model->save()) {
                $fullPath = Yii::app()->basePath . '/../images/userimages/' . $fileName;
                $uploadedFile->saveAs($fullPath);
                $thumb = new EasyImage($fullPath);
                $thumb->scaleAndCrop(250, 250);
                $fullPathThumb = Yii::app()->basePath . '/../images/userimages/thumb/' . $fileName;
                $thumb->save($fullPathThumb);

                $min = new EasyImage($fullPath);
                $min->scaleAndCrop(100, 100);
                $fullPathMin = Yii::app()->basePath . '/../images/userimages/min/' . $fileName;
                $min->save($fullPathMin);

                $this->redirect(Yii::app()->createUrl("/user/profile"));
            }
        }
        if (isset($_POST["User"])) {
            $model->attributes = $_POST["User"];
            $model->first_name =  $model->first_name;
            $model->last_name =  $model->last_name;
            $model->username =  $model->username;
            if ($model->save()) {
                $this->redirect(Yii::app()->createUrl("/user/profile"));
            }
        }

        if (!empty($model->userimage[0]->image)) {
            $image_user = Yii::app()->createAbsoluteUrl("/images/userimages/thumb/" . $model->userimage[0]->image);
        } else {
            $image_user = $model->avatar;
        }

        $this->render("index", array(
            'model' => $model,
            'images_model' => $images_model,
            'premiumPackage' => $premiumPackage,
            'image_user' => $image_user,
        ));
    }

    /**
     * changePassword
     *
     * @author Davit T.
     * @created at 24th day of Jan 2016
     */
    public function actionChangePassword() {
        $response = array(
            'success' => 1,
            'error' => ''
        );
        $model = User::getCurrentUser();
        $model->setScenario(User::SCENARIO_RESET_PASSWORD);

        // Checking old password validness
        $oldPassword = $model->password;
        // Set attributes
        $model->attributes = $_POST['User'];
        $model->old_password = $_POST['User']['old_password'];
        $model->validate();
        if (!$model->old_password) {
            $model->addError('old_password', User::ERR_OLD_PASSWORD_REQUIRED);
        }
        if (!HashHelper::comparePassword($model->old_password, $oldPassword)) {
            $model->addError('old_password', User::ERR_OLD_PASSWORD);
        }
        if ($model->hasErrors()) {
            $response['success'] = 0;
            $response['error'] = $model->getErrors();
        } else {
            $model->save(false);
        }
        echo json_encode($response);
        Yii::app()->end();
    }

    /**
     * Check if user havent pin code set and return 
     *
     * @author Narek T.
     * @created at 21th day of February 2016
     */
    public function actionPin() {
        $currentUser = User::getCurrentUser();
        // Check if user havent pin code
        if (is_null($currentUser->pin)) {
            $currentUser->setPin();
        }
        echo json_encode(array(
            'pin' => $currentUser->pin
        ));
        Yii::app()->end();
    }

    /**
     * change User Image Status
     * if isset user image change Status is BLOCKED
     *
     * @author Hovo G.
     * @created at 5th day of March 2016
     * @param null
     * @return boolean
     */
    private function changeUserImageStatus() {
        $images_model = new UserImage();
        $images_user = $images_model->getUserImages();
        if (!empty($images_user->image)) {
            $images_user->status = "BLOCKED";
            $images_user->update();
        }
        return true;
    }

}
