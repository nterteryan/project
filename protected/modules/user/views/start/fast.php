<?php if (is_null($matrixSeconde)) : ?>
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
 
 
<a href="<?php echo APP_BASE_URL . '/user/order/marketing?id=' . $marketingPlan->id; ?>" class="btn btn-success">Вход</a>

<?php else: ?>



<?php endif; ?>
