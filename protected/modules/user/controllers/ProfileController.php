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
            'postOnly + pin',
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
     * Action Index 
     *
     * @author Narek T.
     * @created at 23th day of Jan 2016
     */
    public function actionIndex() {
        $model = User::getCurrentUser();
        $images_model = new UserImage();
        if(!empty($_POST["UserImage"])){
            $uploadedFile = CUploadedFile::getInstance($images_model, "image");
            $fileName = "user-image-" . time() . "." . $uploadedFile->getExtensionName(); 
            $images_model->image = $fileName;
            $images_model->user_id = Yii::app()->user->id;
            $images_model->validate();
            if (!$images_model->hasErrors()) {
                $this->changeUserImageStatus();
            }

            if($images_model->save())
            {
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
            if ($model->save()) {
                $this->redirect(Yii::app()->createUrl("/user/dashboard"));
            }
        }

        if(!empty($model->userimage[0]->image)){
            $image_user = Yii::app()->createAbsoluteUrl("/images/userimages/thumb/".$model->userimage[0]->image);
        }else{
            $image_user = $model->avatar;
        }
        
        $this->render("index", array(
            'model' => $model,
            'images_model' => $images_model,
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
        if(!$model->old_password) {
            $model->addError('old_password', User::ERR_OLD_PASSWORD_REQUIRED);
        }
        if (!HashHelper::comparePassword($model->old_password, $oldPassword)) {
            $model->addError('old_password', User::ERR_OLD_PASSWORD);
        }
        if ($model->hasErrors()) {
            $response['success'] = 0;
            $response['error'] = $model->getErrors();
        }else{
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
        if(!empty($images_user->image)){
            $images_user->status = "BLOCKED";
            $images_user->update();
        }
        return true;       
    }
}
