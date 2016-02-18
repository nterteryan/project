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
    <body class="<?php echo Yii::app()->user->isGuest ? "guest" : ""; ?> no-padd">
        
        <div class="pageContent">
            
            <?php $this->renderPartial('//layouts/_header_guest'); ?>
            <?php echo $content; ?>
            
            
        </div> 
        <?php $this->renderPartial('//layouts/_footer') ?>
     
    </body>
</html>
