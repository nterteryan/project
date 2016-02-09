<h1><?php echo $marketingPlan->name; ?></h1>

<form action="https://perfectmoney.is/api/step1.asp" method="POST">
<p>
    <input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo Yii::app()->params['payeeAccountPM']; ?>">
    <input type="hidden" name="PAYEE_NAME" value="OO Dom Blaga">
    <input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $marketingPlan->join_amount; ?>">
    <input type="hidden" name="PAYMENT_UNITS" value="USD">
    <input type="hidden" name="PAYMENT_URL" value="<?php echo APP_BASE_URL_ABS . '/payment/perfectVerify'; ?>">
    <input type="hidden" name="NOPAYMENT_URL" value="<?php echo APP_BASE_URL_ABS . '/user/dashboard'; ?>">
    <input type="hidden" name="BAGGAGE_FIELDS" value="ORDER_NUM CUST_NUM KEY_CODE">
    <input type="hidden" name="ORDER_NUM" value="<?php echo $userOrder->id; ?>">
    <input type="hidden" name="CUST_NUM" value="<?php echo $userOrder->user_id; ?>">
    <input type="hidden" name="KEY_CODE" value="marketing">
    <input type="submit" name="PAYMENT_METHOD" class="btn btn-success" value="Потвердить">
</p>
</form>