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

}
