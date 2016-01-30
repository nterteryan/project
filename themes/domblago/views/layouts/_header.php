<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="/<?php echo APP_BASE_URL; ?>" class="navbar-brand">
                <img class="logo-image" src="<?php echo APP_THEME_URL ?>/img/logo.png" />
            </a>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo APP_BASE_URL ?>/site/marketing">Маркетинг-план</a></li>
            </ul>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right">
                <?php if (Yii::app()->user->id) { ?>
                    <li><a href="<?php echo APP_BASE_URL ?>/user/dashboard">Кабинет</a></li>
                    <li><a href="<?php echo APP_BASE_URL ?>/auth/logout">Выйти</a></li>
                <?php } else { ?>
                    <li><a href="<?php echo APP_BASE_URL ?>/auth/login">Вход</a></li>
                    <li><a href="<?php echo APP_BASE_URL ?>/auth/register">Регистрация</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>