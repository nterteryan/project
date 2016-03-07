<?php

/**
 * MatrixActivaRecord
 *
 * @author Narek T. 
 * @created at 24th day of July 2015
 */
class MatrixActivaRecord extends CActiveRecord {
    
    const IS_CLOSED_NO = 'NO';
    const IS_CLOSED_YES = 'YES';

    public $orderNumber;
    
    /**
     * Scopes
     *
     * @author Narek T. 
     * @created at 24th day of July 2015
     * @return array
     */
    public function scopes() {
        return array(
            'notClosed' => array(
                'condition' => $this->getTableAlias(true, false) . '.`is_closed`=:closedNo',
                'params' => array(
                    ':closedNo' => self::IS_CLOSED_NO,
                ),
            ),
            'closed' => array(
                'condition' => $this->getTableAlias(true, false) . '.`is_closed`=:closedYes',
                'params' => array(
                    ':closedNo' => self::IS_CLOSED_YES,
                ),
            ),
        );
    }

    /**
     * Scope by user id
     *
     * @author Narek T.
     * @created at 24th day of January 2015
     * @param integer $userId
     * @return UserMatrixFirst
     */
    public function byUserId($userId) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'user_id =:userId',
            'params' => array(':userId' => $userId),
        ));
        return $this;
    }
    
    /**
     * Scope by user close number
     *
     * @author Narek T.
     * @created at 26th day of January 2015
     * @param integer $closeNumber
     * @return UserMatrixFirst
     */
    public function byCloseNumber($closeNumber) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'close_number =:closeNumber',
            'params' => array(':closeNumber' => $closeNumber),
        ));
        return $this;
    }
    
    /**
     * Get number when user will close his matrix 
     *
     * @author Narek T.
     * @created at 27th day of January 2016
     * @param integer $orderNumber
     * @return integer
     */
    public function getCloseNumber($orderNumber) {
        return ($orderNumber*4 + 3);
    }
    
    /**
     * Mark user in matrix as closed 
     *
     * @author Narek T.
     * @created at 26th day of January 2016
     * @return boolean
     */
    public function markAsClosed() {
        $this->is_closed = self::IS_CLOSED_YES;
        return $this->save(false);
    }
    /**
      * countByOrderNumber
      * count By Order Number
      *
      * @author Hovo G.
      * @created at 7th day of March 2016
      * @param user_order (array)
      * @return array
      */
    public  function countByOrderNumber($matrix){
        $class = get_called_class();
        $orderNumber = $class::model()->countByAttributes(array('order_number'=>$matrix));
        return $orderNumber;
    }

    /**
      * get Matrix Order Users
      * Matrix in 6 (2x 2x+1) (4x 4x+1 4x+2 4x+3)  
      *
      * @author Hovo G.
      * @created at 7th day of March 2016
      * @param user_order (array)
      * @return array
      */
    public static function getMatrixOrderUsers($userOrder){
        $matrix = array();
        for ($i = 1; $i <= 4; $i++) { 
              $i++;
              $matrix[] = $i*$userOrder;
            for ($j = 1; $j <= $i-1 ; $j++) { 
                $matrix[] =  ($i*$userOrder)+$j;
            }
        }
        $matrix = self::countByOrderNumber($matrix);
        return $matrix;
    }
}