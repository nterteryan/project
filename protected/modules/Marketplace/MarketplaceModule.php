<?php

class MarketplaceModule extends CWebModule
{
	private $_assetsUrl;
	// public $defaultController = 'profile';

	public function init() {
	    Yii::app()->assetManager->forceCopy = true;
	    $this->registerAssets();
	    // this method is called when the module is being created
	    // you may place code here to customize the module or the application
	    // import the module-level models and components
	    $this->setImport(array(
	        'user.models.*',
	        'user.components.*',
	    ));
	}
	
	public function beforeControllerAction($controller, $action) {
	    if (defined('YII_DEBUG') && YII_DEBUG) {
	        Yii::app()->assetManager->forceCopy = true;
	    }
	    // $controller->layout = 'user';
	    if (parent::beforeControllerAction($controller, $action)) {
	        // this method is called before any module controller action is performed
	        // you may place customized code here
	        return true;
	    } else
	        return false;
	}
	/**
	 * Return the URL for this module's assets, performing the publish operation
	 * the first time, and caching the result for subsequent use.
	 * 
	 * @return string Url of published assets folder
	 */
	public function getAssetsUrl() {
	    if ($this->_assetsUrl === null) {
	        $this->_assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('user.assets'));
	    }
	    return $this->_assetsUrl;
	}

	private function registerAssets() {
	    $cClientScript = Yii::app()->clientScript;
	    $cClientScript->registerScript("assetsUrl", "var assetsUrl='".$this->getAssetsUrl()."'", CClientScript::POS_HEAD);
	    $cClientScript->registerScriptFile($this->getAssetsUrl() . '/js/user.js', CClientScript::POS_BEGIN);
	    $cClientScript->registerCssFile($this->getAssetsUrl() . '/css/user.css');
	}

}
