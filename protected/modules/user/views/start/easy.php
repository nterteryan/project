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
    <input type="hidden" name="PAYEE_ACCOUNT" value="U9007123">
    <input type="hidden" name="PAYEE_NAME" value="My company">
    <input type="hidden" name="PAYMENT_AMOUNT" value="109.99">
    <input type="hidden" name="PAYMENT_UNITS" value="USD">
    <input type="hidden" name="STATUS_URL" 
        value="https://www.myshop.com/cgi-bin/xact.cgi">
    <input type="hidden" name="PAYMENT_URL" 
        value="https://www.myshop.com/cgi-bin/chkout1.cgi">
    <input type="hidden" name="NOPAYMENT_URL" 
        value="https://www.myshop.com/cgi-bin/chkout2.cgi">
    <input type="hidden" name="BAGGAGE_FIELDS" 
        value="ORDER_NUM CUST_NUM">
    <input type="hidden" name="ORDER_NUM" value="9801121">
    <input type="hidden" name="CUST_NUM" value="2067609">
    <input type="submit" name="PAYMENT_METHOD" class="btn btn-success" value="Вход">
</p>
</form>

<?php else: ?>



<?php endif; ?>

