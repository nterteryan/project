<?php

class CategoriesController extends Controller
{
	public function actionIndex(){
		$clientScript = Yii::app()->getClientScript();
		$clientScript->registerScriptFile(APP_BASE_URL . '/js/ajax_handler.js');
		$clientScript->registerScriptFile(APP_BASE_URL . '/js/main_helper.js');
		$clientScript->registerScriptFile(MARKETPLACE_MODULE_ASSETS_URL . '/js/categories/event_handlers.js');
		$clientScript->registerScriptFile(MARKETPLACE_MODULE_ASSETS_URL . '/js/categories/event_listeners.js');
		$marketplace = Marketplace::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
		if ($marketplace instanceof Marketplace) {
			throw new CHttpException(404, 'Указанная запись не найдена');
			return false;
		}
		$currentUser  = User::getCurrentUser();
		$category     = new Category();
		$categoryList = Category::getMarketplaceCategoryList($marketplace->id);
		$arrayDataProvider = new CArrayDataProvider($categoryList, array(
			'pagination' => array(
				'pageSize' => 10,
		    ),
		));
		$this->render("index", array(
			"category"          => $category,
			"categoryList"      => $categoryList,
			"marketplace"       => $marketplace,
			"arrayDataProvider" => $arrayDataProvider,
		));
	}
	public function actiondeleteCat(){
		$request = Yii::app()->request;
		$id      = $request->getpost('id');
		$cat     = Category::model()->findByPk($id); 
		$cat->delete();
		echo json_encode(array("success" => 1));
 	    Yii::app()->end();
	}
	public function actionGetCatById(){
	    $request = Yii::app()->request;
	    $id = $request->getpost('id');
	    $category = Category::model()->findByPk($id);
        echo json_encode(array("success" => 1,"id" => $category->id,"icone" => $category->icone,"title" => $category->title));
 	    Yii::app()->end();
	}
	public function actionAddEdit(){
		$request      = Yii::app()->request;
		$categoryPost = $request->getpost('Category');
		$marketplace  = Marketplace::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
		$id = $categoryPost["id"] ;
		if(!empty($id)){
			$category = Category::model()->findByPk($id);
			$update = true;
		}else{
			$category = new Category();
			$update = true;
		}
		$category->attributes     = $_POST["Category"];
		$category->marketplace_id = $marketplace->id;
        $category->save();
        if(!$category->getErrors()){
	       echo json_encode(array("success" => 1,"id" => $category->id,"title" => $category->title,"update"=>$update));
	 	   Yii::app()->end();
        }
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
	                'addEdit',
	                'deleteCat',
	                'getCatById',
	            ),
	            'roles' => array(User::ROLE_USER),
	        ),
	        array('deny', // deny all users
	            'users' => array('*'),
	        ),
	    );
	}
	
}