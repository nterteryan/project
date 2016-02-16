<?php

/**
 * HtmlHelper
 *
 * @author Davit T.
 * @created at 23th day of Jan 2016
 */
class HtmlHelper {

    /**
     * hasError
     *
     * @author Davit T.
     * @created at 23th day of Jan 2016
     * @param object $model
     * @param string $field
     * @param string $className
     * @return string
     */
    public static function hasError($model, $field, $className = 'has-error') {
        $className = $model->getError($field) ? $className : "";
        return $className;
    }

    /**
     * displayAmount
     *
     * @author Davit T.
     * @created at 25th day of Jan 2016
     * @param int $amount
     * @param string $currency
     * @return void
     */
    public static function displayAmount($amount, $currency = '$') {
        echo Yii::app()->numberFormatter->formatCurrency($amount, $currency);
    }

    /**
     * routeBasedClass
     *
     * @author Davit T.
     * @created at 16th day of Feb 2016
     * @return string
     */
    public static function actionBasedClass( $route ) {
        $currentRoute = Yii::app()->controller->id.'/'.Yii::app()->controller->action->id;
        //var_dump($currentRoute);
        //var_dump($route);
        if ($currentRoute != $route) {
            return "";
        }
        return 'active';
    }

}
