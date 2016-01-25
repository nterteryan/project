<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">
        <link rel="stylesheet" type="text/css" href="<?php echo APP_THEME_URL; ?>/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo APP_THEME_URL; ?>/css/app-all.css">
        <link rel="stylesheet" type="text/css" href="<?php echo APP_THEME_URL; ?>/css/media-queries.css">
        <script type="text/javascript" src="<?php echo APP_THEME_URL; ?>/js/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="<?php echo APP_THEME_URL; ?>/js/lib/bootsrap.min.js"></script>
        <script type="text/javascript">var APP_BASE_URL = "/<?php echo APP_BASE_URL; ?>"</script>
        <script type="text/javascript" src="<?php echo APP_THEME_URL; ?>/js/app.js"></script>
        <script type="text/javascript">var MODULE_BASE_URL = "/user/<?php echo APP_BASE_URL; ?>"</script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="../" class="navbar-brand">
                        <img class="logo-image" src="<?php echo APP_THEME_URL ?>/img/logo.png" />
                    </a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
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
        <div class="container">
            <div class="page-header" id="banner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h1>Панель Управления</h1>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 padding-none">
                            <br/>
                            <?php $this->widget('application.widgets.userAmounts.UserAmount') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="list-group table-of-contents">
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/dashboard'; ?>">Кабинет</a>
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/profile'; ?>">Профиль</a>
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/'; ?>">Мои Финансы</a>
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/partner/our'; ?>">Наши Партнеры</a>
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/start/easy'; ?>">Легкий старт</a>
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/start/fast'; ?>">Быстрый старт</a>
                        <a class="list-group-item" href="#tables">Акционер</a>
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/partner'; ?>">Структура</a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8">
                    <?php echo $content; ?>
                </div>
            </div>

            <!--<footer>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-unstyled">
                            <li class="pull-right"><a href="#top">Back to top</a></li>
                            <li><a href="http://news.bootswatch.com" onclick="pageTracker._link(this.href);
                                    return false;">Blog</a></li>
                            <li><a href="http://feeds.feedburner.com/bootswatch">RSS</a></li>
                            <li><a href="https://twitter.com/bootswatch">Twitter</a></li>
                            <li><a href="https://github.com/thomaspark/bootswatch/">GitHub</a></li>
                            <li><a href="../help/#api">API</a></li>
                            <li><a href="../help/#support">Support</a></li>
                        </ul>
                        <p>Made by <a href="http://thomaspark.co" rel="nofollow">Thomas Park</a>. Contact him at <a href="mailto:thomas@bootswatch.com">thomas@bootswatch.com</a>.</p>
                        <p>Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/gh-pages/LICENSE">MIT License</a>.</p>
                        <p>Based on <a href="http://getbootstrap.com" rel="nofollow">Bootstrap</a>. Icons from <a href="http://fortawesome.github.io/Font-Awesome/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="http://www.google.com/webfonts" rel="nofollow">Google</a>.</p>
                    </div>
                </div>
            </footer>-->
        </div>
    </body>
</html>
