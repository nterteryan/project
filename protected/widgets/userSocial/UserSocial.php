<?php

/**
 * User Certificates
 *
 * @author Narek T.
 * @created at 31th day of Jan 2016
 */
class UserSocial extends CWidget  {
    
    /**
     * run widget
     *
     * @author Narek T.
     * @created at 31th day of Jan 2016
     * @return void
     */
    public function run() {
        // Get Current user
        //$currentUser = User::getCurrentUser();
        // Check if user is premium, show groups
        $view = 'premium_account';
        $this->render($view);
    }

}
