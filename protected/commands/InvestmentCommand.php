<?php

class InvestmentCommand extends CConsoleCommand {
    public function run() {
        // here we are doing what we need to do
        $model = new UserTariff();
        $userTariffList =  $model->getUserTariffList(array("status" => "ACTIVE"));
        foreach($userTariffList as $key => $value){
            $originalDate = $value->created_date;
            $str= "+".$value->close_month." month ";
            $newDate = date("Y-m-d", strtotime($str,strtotime($originalDate)));
            if($newDate <=  date("Y-m-d") ){
                $model->model()->updateByPk($value->id, array('status' => "BLOCKED"));
            }
            $amount_percent = $value->amount_percent+($value->amount *($value->percent/100));
            $model->model()->updateByPk($value->id, array('amount_percent' => $amount_percent ));
        }

    }
}