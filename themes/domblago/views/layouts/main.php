<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">
        <link rel="stylesheet" type="text/css" href="<?php echo APP_THEME_URL; ?>/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo APP_THEME_URL; ?>/css/app-all.css">
        <link rel="stylesheet" type="text/css" href="<?php echo APP_THEME_URL; ?>/css/guest.css">
        <link rel="stylesheet" type="text/css" href="<?php echo APP_THEME_URL; ?>/css/media-queries.css">
        <script type="text/javascript" src="<?php echo APP_THEME_URL; ?>/js/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="<?php echo APP_THEME_URL; ?>/js/lib/bootsrap.min.js"></script>
        <script type="text/javascript">var APP_BASE_URL = "<?php echo APP_BASE_URL; ?>"</script>
        <script type="text/javascript" src="<?php echo APP_THEME_URL; ?>/js/app.js"></script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body class="<?php echo Yii::app()->user->isGuest ? "guest" : ""; ?>">
        <?php $this->renderPartial('//layouts/_header_guest'); ?>
        <div class="container">
            <?php echo $content; ?>
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
