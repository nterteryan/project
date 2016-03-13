<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    /**
     * beforeAction - define global constants for app, and other global things
     *
     * @author Davit T.
     * @created at 23th day of Jan 2016
     * @param object $action
     * @return boolean
     */
    public function beforeAction($action) {
        $this->defineConstants();
        return parent::beforeAction($action);
    }

    /**
     * defineConstants 
     *
     * @author Davit T.
     * @created @created at 23th day of Jan 2016
     */
    private function defineConstants() {
        // Create constants
        defined('APP_ROOT_PATH') or define('APP_ROOT_PATH', Yii::app()->basePath . '/../');
        defined('APP_BASE_URL') or define('APP_BASE_URL', rtrim(Yii::app()->baseUrl, '/'));
        defined('APP_BASE_URL_ABS') or define('APP_BASE_URL_ABS', rtrim(Yii::app()->createAbsoluteUrl('')));
        defined('APP_THEME_URL') or define('APP_THEME_URL', APP_BASE_URL . '/themes/' . Yii::app()->theme->name);
        defined('USER_MODULE_ASSETS_URL') or define('USER_MODULE_ASSETS_URL', Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('user.assets')));
    }

}