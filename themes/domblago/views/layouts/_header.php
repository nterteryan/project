<div class="navbar navbar-default navbar-fixed-top">
    <div class="container padding-none">
        <div class="navbar-header">
            <a href="/<?php echo APP_BASE_URL; ?>" class="navbar-brand padding-none">
                <img class="logo-image" src="<?php echo APP_THEME_URL ?>/img/logo.png" />
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right margin-none">
                <?php if (Yii::app()->user->id) { ?>
                    <li><a href="<?php echo APP_BASE_URL ?>/user/dashboard">Кабинет</a></li>
                    <li><a href="<?php echo APP_BASE_URL ?>/auth/logout">Выйти</a></li>
                <?php } else { ?>
                    <li><a href="<?php echo APP_BASE_URL ?>/auth/register">Регистрация</a></li>
                    <li><a href="<?php echo APP_BASE_URL ?>/auth/login">Войти</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>