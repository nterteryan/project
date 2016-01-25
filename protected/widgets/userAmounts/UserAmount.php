<?php

/**
 * UserAmount
 *
 * @author Davit T.
 * @created at 25th day of Jan 2016
 */
class UserAmount extends CWidget  {
    
    /**
     * run widget
     *
     * @author Davit T.
     * @created at 25th day of Jan 2016
     * @param
     * @return void
     */
    public function run() {
        $model = User::getCurrentUser();
        $this->render('amounts', array(
            'model'=>$model
        ));
    }

}
