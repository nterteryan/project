<?php

/**
 * TeamController 
 *
 * @author Davit T.
 * @created at 06th day of Feb 2015
 */
class TeamController extends Controller {

    /**
     * actionIndex
     *
     * @author Davit T.
     * @created at 06th day of Feb 2015
     */
    public function actionIndex() {
        $model = User::getCurrentUser();
        $this->render('index');
    }

    /**
     * Fills the JS tree on an AJAX request.
     * Should receive parent node ID in $_GET['root'],
     *  with 'source' when there is no parent.
     */
    public function actionAjaxFillTree() {
        // accept only AJAX request (comment this when debugging)
        if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }
        // parse the user input
        $parentId = "NULL";
        if (isset($_GET['root']) && $_GET['root'] !== 'source') {
            $parentId = (int) $_GET['root'];
        }
        // read the data (this could be in a model)
        $children = Yii::app()->db->createCommand(
                        "SELECT m1.id, m1.username AS text, m2.id IS NOT NULL AS hasChildren "
                        . "FROM users AS m1 LEFT JOIN users AS m2 ON m1.id=m2.parent_id "
                        . "WHERE m1.parent_id <=> $parentId "
                        . "GROUP BY m1.id ORDER BY m1.username ASC LIMIT 0,10"
                )->queryAll();
        echo str_replace(
                '"hasChildren":"0"', '"hasChildren":false', CTreeView::saveDataAsJson($children)
        );
    }

}
