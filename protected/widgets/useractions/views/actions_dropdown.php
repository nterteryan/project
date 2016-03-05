<?php if(!empty($model->userimage[0]->image)){
	$image = Yii::app()->createAbsoluteUrl("/images/userimages/min/".$model->userimage[0]->image);
	}else{
	$image = $model->avatar;
} ?>
<li class="dropdown">
    <a class="dropdown-toggle" style="background-image: url(<?php echo $image ?>)" data-toggle="dropdown" href="#" id="user-name-dropdown">
        <?php echo $model->fullName; ?><span class="caret"></span>
    </a>
    <ul class="dropdown-menu" aria-labelledby="themes">
        <li><a href="<?php echo APP_BASE_URL . '/user/profile'; ?>">Профиль</a></li>
        <li class="divider"></li>
        <li><a href="<?php echo APP_BASE_URL . '/auth/logout'; ?>">Быйти</a></li>
    </ul>
</li>