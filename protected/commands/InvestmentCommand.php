<?php

class InvestmentCommand extends CConsoleCommand {

    public function run() {
        $model = new UserTariff();
        $userTariffList = $model->getUserTariffListForCommand();
        foreach ($userTariffList as $key => $value) {
            $time = strtotime($value->created_date);
            $close_date = date("Y-m-d", strtotime("+ " . $value->close_month . " month", $time));
            $fina = strtotime($close_date);
            if ($fina < strtotime(date("Y-m-d"))) {
                $value->status = "CLOSED";
                $value->update();
            }
            if ($fina >= strtotime(date("Y-m-d"))) {
                $amount_percent = $value->amount_percent + ($value->amount * ($value->percent / 100));
                $model->model()->updateByPk($value->id, array('amount_percent' => $amount_percent));
            }
        }
    }

}