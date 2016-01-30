<?php

/**
 * TermsController
 *
 * @author Davit T.
 * @created at 28th day of Jan 2016
 */
class TermsController extends Controller {

    /**
     * actionCorporatization
     *
     * @author Davit T.
     * @created at 28th day of Jan 2016
     */
    public function actionCorporatization() {
        $this->render("corporatization");
    }

    /**
     * actioncharity
     *
     * @author Davit T.
     * @created at 28th day of Jan 2016
     */
    public function actioncharity() {
        $this->render("charity");
    }

}
