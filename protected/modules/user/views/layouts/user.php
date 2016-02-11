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
        <?php $this->renderPartial('//layouts/_header'); ?>
        <div class="container">
            <!--<div class="page-header" id="banner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h1>Панель Управления</h1>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 padding-none">
                            <br/>
                            <?php //$this->widget('application.widgets.userAmounts.UserAmount') ?>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="row page-header">
                <div class="col-lg-2 col-md-2 col-sm-2 padding-none">
                    <div class="list-group table-of-contents">
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/dashboard'; ?>">Кабинет</a>
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/profile'; ?>">Профиль</a>
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/finance'; ?>">Мои Финансы</a>
                        <a class="list-group-item" href="<?php //echo APP_BASE_URL . '/user/partner/our'; ?>">Наши Партнеры</a>
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/start/easy'; ?>">Легкий старт</a>
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/start/fast'; ?>">Быстрый старт</a>
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/start/partner'; ?>">Акционер</a>
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/certificate'; ?>">Сертификаты</a>
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/start/premium'; ?>">Премиум Соц Сеть</a>
                        <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/team'; ?>">Команда</a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <?php echo $content; ?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <?php $this->widget('application.widgets.userAmounts.UserAmount') ?>
                </div>
            </div>
        </div>
    </body>
</html>
