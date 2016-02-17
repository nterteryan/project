<div class="row">
    <div class="col-lg-12">
        <h1 class="page_title">Авторизация</h1>
        <p class="page_sub_title">пожалуйста заполните форму авторизации:</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-lg-offset-2 auth_inner_bg">
        <div class="panel-body">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'registration'
            ));
            ?>
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'email'); ?>">
                <?php
                echo $form->emailField($model, 'email', array(
                    'class' => 'form-control',
                    'placeholder'=> 'Адрес Электронной Почты *',
                ));
                ?>
                <?php
                echo $form->error($model, 'email', array(
                ))
                ?>
            </div>
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'password'); ?>">
                <?php
                echo $form->passwordField($model, 'password', array(
                    'class' => 'form-control',
                    'placeholder'=> 'Пароль *',
                ));
                ?>
                <?php
                echo $form->error($model, 'password', array(
                ))
                ?>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" id="focusedInput" type="submit" value="Вход">
            </div>
            <div><a href="<?php echo Yii::app()->createUrl("/auth/forgotePassword"); ?>"> Забыли пароль?</a></div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
