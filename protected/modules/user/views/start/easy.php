<?php if (is_null($matrixFirst)) : ?>
<h1>Легкий Старт</h1>

<p>
    Позволяет Вам войти в основной проект с минимальными вложениями. Не имея опыта работы в сети интернет.
    Матрица закрывается общими усилиями. Все участники матрицы занимают места с лева на право, сверху вниз.
    Главная задача от легкого входа, возврат вложенных средств. И переход в следующую матрицу Быстрый старт.
</p>
<p><strong>Вход 25$</strong></p>
<p>
При закрытии второй линии, на Ваш лицевой счет, переходит 25$ которые Вы сможете 
Или вывести на свой указанный счет. Или снова реинвестировать на второй круг.
75$ переводится на вторую матрицу Быстрый старт. И У Вас открывается вторая матрица. 
Все Ваши партнеры идут вслед за Вами.
</p><br />
 
 
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
    <input type="submit" name="PAYMENT_METHOD" class="btn btn-success" value="Вход">
</p>
</form>

<?php else: ?>



<?php endif; ?>

