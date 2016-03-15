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
        <script type="text/javascript" src="<?php echo APP_THEME_URL; ?>/js/script.js"></script>
        <script type="text/javascript" src="<?php echo APP_BASE_URL ?>/js/sticky_footer.js"></script>
        <script type="text/javascript">var MODULE_BASE_URL = "/user/<?php echo APP_BASE_URL; ?>"</script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <?php $this->renderPartial('//layouts/_header'); ?>
        <div class="container content-same-height clearfix padding-top-20">
            <div class="row margin-none row-eq-height">
                <div class="col-lg-2 col-md-12 sidebar-left">
                    <ul class="list-group-header nav nav-tabs">
                        <li class="active">
                            <a href="#home" class="bg-centered-icon bg-home" data-toggle="tab" aria-expanded="true"></a>
                        </li>
                        <li class="">
                            <a href="#social" data-toggle="tab" class="bg-centered-icon bg-group" aria-expanded="false"></a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="list-group table-of-contents tab-pane fade active in" id="home">
                            <a class="list-group-item active" href="<?php echo APP_BASE_URL . '/user/profile'; ?>">Профиль</a>
                            <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/finance'; ?>">Мои Финансы</a>
                            <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/marketing/easy'; ?>">Легкий старт</a>
                            <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/marketing/fast'; ?>">Быстрый старт</a>
                            <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/marketing/partner'; ?>">Партнер</a>
                            <!--<a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/team'; ?>">Моя Команда</a>-->
                            <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/certificate'; ?>">Сертификаты</a>
                            <a class="list-group-item" href="<?php echo APP_BASE_URL . '/user/investment'; ?>">Инвестиции</a>
                        </div>
                        <div class="tab-pane fade" id="social">
                            <?php $this->widget('application.widgets.userSocial.UserSocial'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 padding-none content">
                    <?php echo $content; ?>
                </div>
                <div class="col-lg-2 col-md-12 sidebar-right">
                    <?php $this->widget('application.widgets.userAmounts.UserAmount'); ?>
                    <ul class="advertisement">
                        <li>
                            <a><img src="<?php echo APP_THEME_URL ?>/img/banner1.png" class="banner-image" src=""></a>
                        </li>
                        <li>
                            <a><img src="<?php echo APP_THEME_URL ?>/img/banner2.png" class="banner-image" src=""></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sticky-maker"></div>
        <?php $this->renderPartial("//layouts/_footer") ?>
    </body>
</html>
