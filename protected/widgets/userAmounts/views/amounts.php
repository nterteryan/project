<ul class="w-user-amount-nav nav nav-pills">
    <li class="active">
        <a href="<?php echo APP_BASE_URL . '/user/finance'; ?>">
            Лицевой <span class="badge"><?php HtmlHelper::displayAmount($model->amount); ?></span>
        </a>
        <span class="glyphicon glyphicon-info-sign" data-container="body" data-toggle="popover" 
                data-placement="left" data-content="Лицевой счет, это по сути Ваш кошелек в МБО Дом Блага. Он служит для оплаты любого товара и услуги в данном проекте."></span>
    </li>
    <?php if ($model->isPartner()) { ?>
        <li class="active">
            <a href="#">
                Накопительный  <span class="badge"> <?php HtmlHelper::displayAmount($model->personal_amount); ?></span>
            </a>
        </li>
    <?php } ?>
</ul>