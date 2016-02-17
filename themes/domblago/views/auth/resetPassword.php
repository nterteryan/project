<div class="row">
    <div class="col-lg-12">
        <h1 class="page_title">Сбросить пароль</h1>
        <p class="page_sub_title">Поля с символом <span class="required">*</span> обязательны для заполнения.</p>
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
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'repeat_password'); ?>">
                <?php
                echo $form->passwordField($model, 'repeat_password', array(
                    'class' => 'form-control',
                     'placeholder'=> 'Повторите Пароль *',
                ));
                ?>
                <?php
                echo $form->error($model, 'repeat_password', array(
                ))
                ?>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" id="focusedInput" type="submit" value="Установить">
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
