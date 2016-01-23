<div class="page-header" id="banner">
    <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-6">
            <h1>Регистрация</h1>
            <p>Поля с символом <span class="required">*</span> обязательны для заполнения.</p>
        </div>
    </div>
</div>
<div class="bs-docs-section clearfix">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Форма Регистрации</h3>
        </div>
        <div class="panel-body">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'registration'
            ));
            ?>
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'first_name'); ?>">
                <?php
                echo $form->labelEx($model, 'first_name', array(
                    'class' => 'control-label'
                ))
                ?>
                <?php
                echo $form->textField($model, 'first_name', array(
                    'class' => 'form-control'
                ));
                ?>
                <?php
                echo $form->error($model, 'first_name', array(
                ))
                ?>
            </div>
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'last_name'); ?>">
                <?php
                echo $form->labelEx($model, 'last_name', array(
                    'class' => 'control-label'
                ))
                ?>
                <?php
                echo $form->textField($model, 'last_name', array(
                    'class' => 'form-control'
                ));
                ?>
                <?php
                echo $form->error($model, 'last_name', array(
                ))
                ?>
            </div>
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'email'); ?>">
                <?php
                echo $form->labelEx($model, 'email', array(
                    'class' => 'control-label'
                ))
                ?>
                <?php
                echo $form->emailField($model, 'email', array(
                    'class' => 'form-control'
                ));
                ?>
                <?php
                echo $form->error($model, 'email', array(
                ))
                ?>
            </div>
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'password'); ?>">
                <?php
                echo $form->labelEx($model, 'password', array(
                    'class' => 'control-label'
                ))
                ?>
                <?php
                echo $form->passwordField($model, 'password', array(
                    'class' => 'form-control'
                ));
                ?>
                <?php
                echo $form->error($model, 'password', array(
                ))
                ?>
            </div>
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'repeat_password'); ?>">
                <?php
                echo $form->labelEx($model, 'repeat_password', array(
                    'class' => 'control-label'
                ))
                ?>
                <?php
                echo $form->passwordField($model, 'repeat_password', array(
                    'class' => 'form-control'
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
