<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">
        <link rel="stylesheet" type="text/css" href="<?php echo APP_THEME_URL; ?>/css/bootstrap.css">
        <script type="text/javascript" src="<?php echo APP_THEME_URL; ?>/js/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="<?php echo APP_THEME_URL; ?>/js/lib/bootsrap.min.js"></script>
        <script type="text/javascript">var APP_BASE_URL="<?php echo APP_BASE_URL; ?>"</script>
        <script type="text/javascript" src="<?php echo APP_THEME_URL; ?>/js/app.js"></script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="../" class="navbar-brand">Bootswatch</a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Themes <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="themes">
                                <li><a href="../default/">Default</a></li>
                                <li class="divider"></li>
                                <li><a href="../cerulean/">Cerulean</a></li>
                                <li><a href="../cosmo/">Cosmo</a></li>
                                <li><a href="../cyborg/">Cyborg</a></li>
                                <li><a href="../darkly/">Darkly</a></li>
                                <li><a href="../flatly/">Flatly</a></li>
                                <li><a href="../journal/">Journal</a></li>
                                <li><a href="../lumen/">Lumen</a></li>
                                <li><a href="../paper/">Paper</a></li>
                                <li><a href="../readable/">Readable</a></li>
                                <li><a href="../sandstone/">Sandstone</a></li>
                                <li><a href="../simplex/">Simplex</a></li>
                                <li><a href="../slate/">Slate</a></li>
                                <li><a href="../spacelab/">Spacelab</a></li>
                                <li><a href="../superhero/">Superhero</a></li>
                                <li><a href="../united/">United</a></li>
                                <li><a href="../yeti/">Yeti</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../help/">Help</a>
                        </li>
                        <li>
                            <a href="http://news.bootswatch.com">Blog</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Cerulean <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="download">
                                <li><a href="http://jsfiddle.net/bootswatch/9y480qo5/">Open Sandbox</a></li>
                                <li class="divider"></li>
                                <li><a href="./bootstrap.min.css">bootstrap.min.css</a></li>
                                <li><a href="./bootstrap.css">bootstrap.css</a></li>
                                <li class="divider"></li>
                                <li><a href="./variables.less">variables.less</a></li>
                                <li><a href="./bootswatch.less">bootswatch.less</a></li>
                                <li class="divider"></li>
                                <li><a href="./_variables.scss">_variables.scss</a></li>
                                <li><a href="./_bootswatch.scss">_bootswatch.scss</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <?php if (Yii::app()->user->id) { ?>
                            <li><a href="<?php echo APP_BASE_URL ?>/auth/logout">Logout</a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo APP_BASE_URL ?>/auth/login">Login</a></li>
                            <li><a href="<?php echo APP_BASE_URL ?>/auth/register">Register</a></li>
                        <?php } ?>
                    </ul>

                </div>
            </div>
        </div>
        <div class="container">
            <?php echo $content; ?>
            <footer>
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
            </footer>
        </div>
    </body>
</html>
