
<div class="row">
    <div class="col-lg-12">
        <h1 class="page_title">Регистрация</h1>
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
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'first_name'); ?>">                
                <?php
                echo $form->textField($model, 'first_name', array(
                    'class' => 'form-control',
                    'placeholder'=> 'Имя',
                ));
                ?>
                <?php
                echo $form->error($model, 'first_name', array(
                ))
                ?>
            </div>
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'last_name'); ?>">
               
                <?php
                echo $form->textField($model, 'last_name', array(
                    'class' => 'form-control',
                    'placeholder'=> 'Фамилия',
                ));
                ?>
                <?php
                echo $form->error($model, 'last_name', array(
                ))
                ?>
            </div>
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'username'); ?>">                
                <?php
                echo $form->textField($model, 'username', array(
                    'class' => 'form-control',
                    'placeholder'=> 'Никнейм *',
                ));
                ?>
                <?php
                echo $form->error($model, 'username', array(
                ))
                ?>
            </div>
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'skype'); ?>">
                <?php
                echo $form->textField($model, 'skype', array(
                    'class' => 'form-control',
                    'placeholder'=> 'skype name *',
                ));
                ?>
                <?php
                echo $form->error($model, 'skype', array(
                ))
                ?>
            </div>
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
                <input class="btn btn-primary" id="focusedInput" type="submit" value="Регистрация">
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
