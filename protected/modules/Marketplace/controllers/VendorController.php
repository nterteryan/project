<?php

class VendorController extends Controller
{
	public function actionIndex(){
		$marketplace = Marketplace::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
		if ($marketplace instanceof Marketplace) {
       		$this->redirect(Yii::app()->createUrl("/marketplace"));
		}
        $request = Yii::app()->request;

        $user = User::getCurrentUser();
        $marketplace = new Marketplace();
        

        if(!empty($_POST["Marketplace"])){
        		$marketplace->attributes = $_POST["Marketplace"];
        	    $uploadedFile = CUploadedFile::getInstance($marketplace, "image");
        	    $fileName = "marketplace-image-" . time() . "." . $uploadedFile->getExtensionName();
        			$marketplace->logo = $fileName;
        	        $fullPath = Yii::app()->basePath . '/../images/marketplace/' . $fileName;
        	        $uploadedFile->saveAs($fullPath);
        	        $thumb = new EasyImage($fullPath);
        	        $thumb->scaleAndCrop(250, 250);
        	        $fullPathThumb = Yii::app()->basePath . '/../images/marketplace/thumb/' . $fileName;
        	        $thumb->save($fullPathThumb);

        	        $min = new EasyImage($fullPath);
        	        $min->scaleAndCrop(100, 100);
        	        $fullPathMin = Yii::app()->basePath . '/../images/marketplace/min/' . $fileName;
        	        $min->save($fullPathMin);

           			$marketplace->user_id = Yii::app()->user->id;
        	        $marketplace->save();
        	        $this->redirect(Yii::app()->createUrl("/marketplace"));

        }
		$this->render("index", array(
			'user'        => $user,
			'marketplace' => $marketplace,
		));

	}

	public function filters() {
	    return array(
	        'accessControl', // perform access control for CRUD operations
	            //'postOnly',
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
	            ),
	            'roles' => array(User::ROLE_USER),
	        ),
	        array('deny', // deny all users
	            'users' => array('*'),
	        ),
	    );
	}
	
}