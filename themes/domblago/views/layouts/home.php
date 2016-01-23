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
        <script type="text/javascript">var APP_BASE_URL = "<?php echo APP_BASE_URL; ?>"</script>
        <script type="text/javascript" src="<?php echo APP_THEME_URL; ?>/js/app.js"></script>
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
                            <li><a href="<?php echo APP_BASE_URL ?>/auth/logout">Выйти</a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo APP_BASE_URL ?>/auth/login">Вход</a></li>
                            <li><a href="<?php echo APP_BASE_URL ?>/auth/register">Регистрация</a></li>
                        <?php } ?>
                    </ul>

                </div>
            </div>
        </div>
        <?php echo $content; ?>
    </body>
</html>
