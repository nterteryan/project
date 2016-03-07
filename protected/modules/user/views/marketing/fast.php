<div class="col-md-12">
    <?php if (is_null($matrixSeconde)) : ?>
        <h1>Быстрый старт</h1>

        <p>
            Позволяет Вам войти в Основной проект не имея достаточно на вход, с возможностью 
            тут же возвратить свои финансы. И в добавок ко всему зарабатывать неограниченное 
            количесвто денег путем реинвестиции.
        </p>
        <p><strong>Вход 75$</strong></p>
        <p>
            При закрытии вертушки, на Ваш лицевой счет, переходит 75$ которые Вы можете вывести на свой счет, или реинвестировать до безконечности
            100$ которые Вам открывают полноценное партнерсвто с возможностью покупки акций того направления которое Вы самостоятельно выбираете.
            25$ идут на Благотворительность. 25$ отчисление на пассиывный доход. 50$ на ротацию
        </p><br />

        <div class="pin-box">
            <div class="message-box"></div>
            <a href="#" class="btn btn-success" data-id="<?php echo $marketingPlan->id; ?>" onclick="User.getPinForm(event, this)">Войти</a>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-xs-12">
                <h1>Вы вошли в Вертушку Быстрый Старт</h1>
            </div>  
        </div>  
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <img src="<?php echo Yii::app()->createUrl("/images/marketing/right/Right_vrt_".$matrixCount.".png") ?>" class="img-responsive" >
                </div>
                <div class="col-xs-6">
                    <img src="<?php echo Yii::app()->createUrl("/images/marketing/left/Left_vert_GIF.gif") ?>" class="img-responsive" >
                </div>
            </div>  
        </div>
    <?php endif; ?>

</div>