<div class="col-md-12">
    <p class="heading">Моя рефферальная ссылка</p>
    <div class="form-group">
        <?php
        echo CHtml::urlField('', $model->refferalUrl, array(
            'class' => 'form-control',
        ));
        ?>
    </div>
    <hr class="hr-dotted" />
    <div class="heading">
        Пин код: <span class="pin-box"></span><a class="btn btn-primary" id="pin">Показать</a>
    </div>
    <hr class="hr-dotted" />

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Мой Профиль</h3>
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
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'username'); ?>">
                <?php
                echo $form->labelEx($model, 'username', array(
                    'class' => 'control-label'
                ))
                ?>
                <?php
                echo $form->textField($model, 'username', array(
                    'class' => 'form-control'
                ));
                ?>
                <?php
                echo $form->error($model, 'username', array(
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
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'skype'); ?>">
                <?php
                echo $form->labelEx($model, 'skype', array(
                    'class' => 'control-label'
                ))
                ?>
                <?php
                echo $form->textField($model, 'skype', array(
                    'class' => 'form-control'
                ));
                ?>
                <?php
                echo $form->error($model, 'skype', array(
                ))
                ?>
            </div>
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'phone'); ?>">
                <?php
                echo $form->labelEx($model, 'phone', array(
                    'class' => 'control-label'
                ))
                ?>
                <?php
                echo $form->textField($model, 'phone', array(
                    'class' => 'form-control'
                ));
                ?>
                <?php
                echo $form->error($model, 'phone', array(
                ))
                ?>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" id="focusedInput" type="submit" value="Изменить">
                <input class="btn btn-primary" id="change-password" type="submit" value="Сменить Пароль">
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
    <?php $this->renderPartial("_changePasswordModal", array('model' => $model)) ?>
</div>