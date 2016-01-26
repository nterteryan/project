<h1>Легкий Старт</h1>

<form action="https://perfectmoney.is/api/step1.asp" method="POST">
<p>
    <input type="hidden" name="PAYEE_ACCOUNT" value="U1243895">
    <input type="hidden" name="PAYEE_NAME" value="My company">
    <input type="hidden" name="PAYMENT_AMOUNT" value="0.5">
    <input type="hidden" name="PAYMENT_UNITS" value="USD">
    <input type="hidden" name="PAYMENT_URL" value="<?php echo APP_BASE_URL_ABS . '/payment/perfectVerify'; ?>">
    <input type="hidden" name="NOPAYMENT_URL" value="<?php echo APP_BASE_URL_ABS . '/user/dashboard'; ?>">
    <input type="hidden" name="BAGGAGE_FIELDS" value="ORDER_NUM CUST_NUM KEY_CODE">
    <input type="hidden" name="ORDER_NUM" value="00001">
    <input type="hidden" name="CUST_NUM" value="2">
    <input type="hidden" name="KEY_CODE" value="marketing">
    <input type="submit" name="PAYMENT_METHOD" class="btn btn-success" value="Потвердить">
</p>
</form>