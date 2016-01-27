<?php

/**
 * PartnerController
 *
 * @author Davit T.
 * @created at 25th day of Jan 2016
 */
class PartnerController extends Controller {

    /**
     * actionIndex
     *
     * @author Davit T.
     * @created at 25th day of Jan 2016
     * @param
     * @return void
     */
    public function actionIndex() {
        $model = User::getCurrentUser();
        //$structureDataProviders = $model->structureData();
        //die();
        $this->render('index', array(
            'data' => $structureDataProviders,
            'model' => $model,
        ));
    }

}
