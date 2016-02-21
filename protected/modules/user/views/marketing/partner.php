<div class="col-md-12">
    <?php if (!$currentUser->isPartner()) : ?>
        <h1>Стать Партнером</h1>

        <p>
            Позволяет Вам войти в Основной проект не имея достаточно на вход, с возможностью 
            тут же возвратить свои финансы. И в добавок ко всему зарабатывать неограниченное 
            количесвто денег путем реинвестиции.
        </p>
        <p><strong>Вход 100$</strong></p>


        <a onclick="User.chekcAcceptedTerms(event)" href="<?php echo APP_BASE_URL . '/user/order/marketing?id=' . $marketingPlan->id; ?>" class="btn btn-success">Вход</a>
        &nbsp;&nbsp;&nbsp;
        <input type="checkbox" id="check-terms-corporatization" />
        <a target="_blank" href="<?php echo Yii::app()->createUrl("/terms/corporatization"); ?>" >Я согласен с условиями соглашения</a>
    <?php else: ?>

        <h3>Структура в разработке.</h3>

    <?php endif; ?>
</div>
