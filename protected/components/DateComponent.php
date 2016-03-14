<?php

/**
 * Date Component
 *
 * @author Hovo G.
 * @created at 14th day of March 2016
 */
class DateComponent extends CUserIdentity {

    /**
     * looking Day
     *
     * @author Hovo G.
     * @created at 14th day of March 2016
     * @param string $dateName 
     * @return boolean
     */
    public static function lookingDay($dateName) {
        return ($dateName == date("D")) ? true : false;
    }

}