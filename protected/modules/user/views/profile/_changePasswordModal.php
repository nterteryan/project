<div id='change-password-modal' class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title">Смена Пароля</h4>
            </div>
            <div class="modal-body">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'change-password-form',
                    'htmlOptions' => array(
                        'data-user-id' => $model->id
                    )
                ));
                ?>
                <div class="form-group <?php echo HtmlHelper::hasError($model, 'password'); ?>">
                    <?php
                    echo $form->labelEx($model, 'old_password', array(
                        'class' => 'control-label'
                    ))
                    ?>
                    <?php
                    echo $form->passwordField($model, 'old_password', array(
                        'class' => 'form-control',
                        'value' => '',
                    ));
                    ?>
                    <div class='errorMessage hidden'></div>
                </div>
                <div class="form-group <?php echo HtmlHelper::hasError($model, 'old_password'); ?>">
                    <?php
                    echo $form->labelEx($model, 'password', array(
                        'class' => 'control-label'
                    ))
                    ?>
                    <?php
                    echo $form->passwordField($model, 'password', array(
                        'class' => 'form-control',
                        'value' => '',
                    ));
                    ?>
                    <div class='errorMessage hidden'></div>
                </div>
                <div class="form-group <?php echo HtmlHelper::hasError($model, 'repeat_password'); ?>">
                    <?php
                    echo $form->labelEx($model, 'repeat_password', array(
                        'class' => 'control-label',
                        'required' => true
                    ))
                    ?>
                    <?php
                    echo $form->passwordField($model, 'repeat_password', array(
                        'class' => 'form-control'
                    ));
                    ?>
                    <div class='errorMessage hidden'></div>
                </div>
                <div class="progress progress-striped active">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Выход</button>
                <button id='change-password-submit' type="button" class="btn btn-primary">Сменить</button>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>