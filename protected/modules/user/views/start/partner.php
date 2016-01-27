<?php if (!$currentUser->isPartner()) : ?>
<h1>Стать Партнером</h1>

<p>
   Позволяет Вам войти в Основной проект не имея достаточно на вход, с возможностью 
   тут же возвратить свои финансы. И в добавок ко всему зарабатывать неограниченное 
   количесвто денег путем реинвестиции.
</p>
<p><strong>Вход 100$</strong></p>
 
 
<a href="<?php echo APP_BASE_URL . '/user/order/marketing?id=' . $marketingPlan->id; ?>" class="btn btn-success">Вход</a>

<?php else: ?>



<?php endif; ?>

