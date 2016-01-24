<?php if (is_null($matrixFirst)) : ?>
<h1>Быстрый старт</h1>

<p>
   Позволяет Вам войти в Основной проект не имея достаточно на вход, с возможностью 
   тут же возвратить свои финансы. И в добавок ко всему зарабатывать неограниченное 
   количесвто денег путем реинвестиции.
</p>
<p><strong>Вход 75$</strong></p>
<p>
При закрытии второй линии, на Ваш лицевой счет, переходит 75$ которые Вы можете вывести на свой счет, или реинвестировать до безконечности
100$ которые Вам открывают полноценное партнерсвто с возможностью покупки акций того направления которое Вы самостоятельно выбираете.
25$ идут на Благотворительность. 25$ отчисление на пассиывный доход. 50$ на ротацию
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

