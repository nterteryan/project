<?php

/**
 * User Certificates
 *
 * @author Narek T.
 * @created at 31th day of Jan 2016
 */
class UserCertificates extends CWidget  {
    
    /**
     * run widget
     *
     * @author Narek T.
     * @created at 31th day of Jan 2016
     * @return void
     */
    public function run() {
        // Get Current user
        $currentUser = User::getCurrentUser();
        $userCertificates = UserCertificate::getUserCertificates($currentUser->id);
        $this->render('certificate', array(
            'userCertificates' => $userCertificates
        ));
    }

}
