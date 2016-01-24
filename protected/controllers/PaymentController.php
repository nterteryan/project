<?php

class PaymentController extends Controller {

    public function actionPerfectVerify() {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        die();
        $this->render('perfectVerify');
    }

}