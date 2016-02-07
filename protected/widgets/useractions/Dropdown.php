<?php

class Dropdown extends CWidget {

    public function run() {
        $model = User::getCurrentUser();
        $this->render('actions_dropdown', array(
            "model" => $model
        ));
    }

}
