<h4>Вы собираетесь пополнить ваш лицевой счет на сумму <?php echo $userOrder->amount; ?>$</h4>
<form action="https://perfectmoney.is/api/step1.asp" method="POST">
    <input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo Yii::app()->params['payeeAccountPM']; ?>">
    <input type="hidden" name="PAYEE_NAME" value="OO Dom Blaga">
    <input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $userOrder->amount; ?>">
    <input type="hidden" name="PAYMENT_UNITS" value="USD">
    <input type="hidden" name="PAYMENT_URL" value="<?php echo APP_BASE_URL_ABS . '/payment/perfectVerify'; ?>">
    <input type="hidden" name="NOPAYMENT_URL" value="<?php echo APP_BASE_URL_ABS . '/user/finance'; ?>">
    <input type="hidden" name="BAGGAGE_FIELDS" value="ORDER_NUM CUST_NUM KEY_CODE">
    <input type="hidden" name="ORDER_NUM" value="<?php echo $userOrder->id; ?>">
    <input type="hidden" name="CUST_NUM" value="<?php echo $userOrder->user_id; ?>">
    <input type="hidden" name="KEY_CODE" value="<?php echo UserOrder::TYPE_CHARGE; ?>">
    <input type="submit" name="PAYMENT_METHOD" class="btn btn-success" value="Потвердить">
</form>