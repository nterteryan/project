<div class="col-md-12">
<?php if (is_null($matrixFirst)) : ?>
<h1>Легкий Старт</h1>
<p>
    Позволяет Вам войти в основной проект с минимальными вложениями. Не имея опыта работы в сети интернет.
    Первая вертушка закрывается общими усилиями. Все участники вертушки занимают места с лева на право, сверху вниз.
    Главная задача от легкого входа, возврат вложенных средств. И переход в следующую вертушку Быстрый старт.
</p>
<p><strong>Вход 25$</strong></p>
<p>
При закрытии вертушки, на Ваш лицевой счет, переходит 25$ которые Вы сможете 
Или вывести на свой указанный счет. Или снова реинвестировать на второй круг.
75$ переводится на вторую вертушку Быстрый старт. И У Вас открывается вторая вертушка. 
Все Ваши партнеры идут вслед за Вами.
</p><br />
<div class="pin-box">
    <a href="#" class="btn btn-success" data-id="<?php echo $marketingPlan->id; ?>" onclick="User.getPinForm(event, this)">Войти</a>
</div>
<?php else: ?>
<div class="row">
	<div class="col-xs-12">
		<h1>Вы вошли в Вертушку Легкий Старт</h1>
	</div>	
</div>	
<div class="row">
	<div class="col-xs-12">
		<div class="col-xs-6">
			<img src="<?php echo Yii::app()->createUrl("/images/marketing/left/Left_vrt_".$matrixCount.".png") ?>" class="img-responsive" >
		</div>
		<div class="col-xs-6">
			<img src="<?php echo Yii::app()->createUrl("/images/marketing/left/Left_vert_GIF.gif") ?>" class="img-responsive" >
		</div>
	</div>	
</div>
<?php endif; ?>

</div>