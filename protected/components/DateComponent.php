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
     * @param  $datName (str) "Mon" 
     * @return boolean
     */
   public static function lookingDay($datName)
   {
        if($datName == date("D"))
            return true;

        return false;
   }

}