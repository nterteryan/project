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

}