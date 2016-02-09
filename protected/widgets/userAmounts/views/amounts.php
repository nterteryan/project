<ul class="w-user-amount-nav nav nav-pills block-right">
    <li class="active"><a href="<?php echo APP_BASE_URL . '/user/finance'; ?>">
            Лицевой <span class="badge"><?php HtmlHelper::displayAmount($model->amount); ?></span></a>
    </li>
    <?php if ($model->isPartner()) { ?>
        <li class="active">
            <a href="#">
                Накопительный  <span class="badge"> <?php HtmlHelper::displayAmount($model->personal_amount); ?></span>
            </a>
        </li>
    <?php } ?>
</ul>