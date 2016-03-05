<div class="col-md-12">
    <div class="heading referral_link">
        Моя рефферальная ссылка: 
        <a href="<?php echo $model->refferalUrl; ?>"><?php echo $model->refferalUrl; ?></a>        
    </div>
   
    <div class="heading">
        Пин код: <span class="pin-box"></span><a class="btn btn-pin" id="pin">Показать</a>
    </div>
    <hr class="hr-dashed" />

    <div class=" profile">
        
        <h3 class="panel-title">Мой Профиль</h3>
        
        <div class="row personal-info">
            <div class="col-md-3 image">
                <img src="<?php echo   $image_user  ?>" class="banner-image" id="user_image" >
                <?php    
                    $formImages = $this->beginWidget('CActiveForm', array(
                        'id' => 'imageUpload',
                        'enableAjaxValidation'=>false,
                        'htmlOptions' => array(
                        'enctype'  => 'multipart/form-data',
                      )
                    ));
                ?>
                <div class="fileUpload" >
                    <a href="#">Изменить Фото</a>
                        <div id="fileUpload">
                            
                        </div>
                    <?php 
                        echo $formImages->fileField($images_model,'image'); 
                        echo $formImages->error($images_model, 'image', array());
                    ?>
                </div>
            
               <?php $this->endWidget();?>    
            </div>
            <div class="col-md-9">
                <div class="type">
                    Тип пользователя:
                    <div class="icon-partner">ПАРТНЕР</div>
                </div>
                <div class="description">
                    В момент привязки платежной системы к порталу, Вы можете делать оплату на указанные  счета. Подтвердить перевод путем сканирования или снимка скрин шот отправить на почту  domblaga@gmail.com Тема письма Оплата пакета (Соучредитель)
                </div>
                <div>
                    <a class="btn btn-partner">Стать соучредителем</a>
                </div>
            </div>
        </div>
        
        <div class="">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'registration',
                'enableAjaxValidation'=>false,
                'htmlOptions' => array(
                   'enctype'  => 'multipart/form-data',
                )
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
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'skype'); ?>">
                <?php
                echo $form->labelEx($model, 'skype', array(
                    'class' => 'control-label icon-skype'
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
            
            <div class="form-group action-buttons">
                <label class="control-label ">
                    <input class="btn btn-change-pass" id="change-password" type="submit" value="Сменить Пароль">
                </label>
                <div class="buttons-right">
                    <input class="btn btn-save-changes" id="focusedInput" type="submit" value="Сохранить изменения">
                    <input class="btn btn-cancel" type="submit" value="Отмена">
                </div>
                
                
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
    <?php $this->renderPartial("_changePasswordModal", array('model' => $model)) ?>
</div>