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
                <!--                 
                <div class="col-xs-6">
                    <a class="btn btn-partner">Стать соучредителем</a>
                </div> 
                -->
<?php if($model->is_premium != "YES"){ ?>
                <div class="col-xs-6">
                    <a class="btn btn-partner premium_b"  data-toggle="modal" data-target="#premium" >Премиум</a>
                </div>
<?php } ?>

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
                <div class="control-label">
                    <?php
                        echo  $model->first_name;
                    ?>
                </div>
            </div>
            <div class="form-group <?php echo HtmlHelper::hasError($model, 'last_name'); ?>">
                <?php
                echo $form->labelEx($model, 'last_name', array(
                    'class' => 'control-label'
                ))
                ?>
                <div class="control-label">
                    <?php
                        echo  $model->last_name;
                    ?>
                </div>
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
<?php if($model->is_premium != "YES"){ ?>
<!-- Modal -->
<div id="premium" class="modal fade bs-example-modal-lg" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Премиум Аккаунт</h4>
            </div>
            <div class="modal-body ">
                    <h5>Премиум Аккаунт</h5>
                    <div id="danger"></div>
                    <p>
                        Пользователи нашего сайта могут оформить премиум аккаунт и получить доступ к уникальным возможностям.
                        С Премиум аккаунтом Вам станет доступна опция создания сообществ. Группы могут служить, как средством поиска единомышленников и приятных собеседников, так и средством продвижения Вашего стартапа и привлечения инвесторов! Правильное название группы и ее полное описание поможет привлечь больше участников.
                        В сообщества можно приглашать, как уже зарегистрированных участников Социальной сети «Дом Блага», так и тех, кого еще ждет знакомство с нашими предложениями. Соседи, сотрудники, общественные деятели и бизнесмены – все они в Вашем сообществе! Кроме того, Вы сможете ставить лайки, делиться понравившимися фото, создавать рекламу и получать за это денежные вознаграждения!
                        С покупкой премиума открывается доступ к еще одному источнику дохода! Всем премиум участникам полагается финансовое вознаграждение за друзей, которые также приобретут премиум! Регистрируйтесь, получайте больше возможностей и зарабатывайте деньги для изменения жизни к лучшему! «Дом Блага» - это не просто социальная сеть. Это сеть, которая делится своими доходами и платит за то, что Вы с нами.
                    </p>
                    <?php foreach ($premiumPackage as $key => $value) :?>
                            <a class="btn btn-partner premiumAdd margin-left-5p" data-id="<?= $value->id ?>"data-month="<?= $value->close_month ?>" data-price="<?= $value->price ?>">
                                  <?= $value->price ?>$ за <?= $value->close_month ?> месяц 
                            </a>
                    <?php endforeach; ?>    
            </div>
            <div class="modal-footer">
                <div class="partnerSave"></div>
            </div>
        </div>
    </div>
<!-- endModal   -->
</div>
<?php } ?>

<script type="text/javascript">
    $( document ).ready(function() {
        $(".premiumAdd").on("click",function(event){
            premium_id =  $(this).data("id");
            premium_month =  $(this).data("month");
            premium_price =  $(this).data("price");
            $("#partnerButton").show();
            $(".partnerSave").html('<div class="col-xs-12">'+premium_price+"$ за "+premium_month+" месяц </div>");
            html = "";
            html += '<div class="form-group col-xs-6">';
            html += '     <label class="contrel required col-xs-3" for="sendPin">PIN:<span class="required">*</span></label>';
            html += '     <div class="col-xs-9">';
            html += '        <input class="form-control "  id="sendPin" type="password">';
            html += '      </div> ';            
            html += '</div> ';                   
            html += '<div class="form-group col-xs-6">';
            html += '     <label class="contrel required col-xs-2" for="autoBil">авто:</label>';
            html += '     <div class="col-xs-1">';
            html += '        <input class=" " id="autoBil" type="checkbox">';
            html += '      </div> ';     
            html += '<button type="button" class="btn btn-info" data-id="'+premium_id+'" data-month="'+premium_month+'" data-price="'+premium_price+'" id="partnerButton" >Подтвердить</button>'
            html += '</div> ';            
            $(".partnerSave").append(html);
        });
    })
    $(document).on("click","#partnerButton",function(argument) {
        id      =  $(this).data("id");
        pin     = $("#sendPin").val();
        auto = 0;
        var url = "/user/profile/premium";
        if ($('input#autoBil').is(':checked')) {
            auto = 1;
        }

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {id:id,pin:pin,auto:auto},
            success: function(mes) {
                if(!mes.error){
                    html ='<div class="alert alert-success col-xs-12">';
                        html += "success";
                    html += '</div>';
                    $("#danger").html(html);
                    setTimeout(function(){ 
                        $('#premium').modal('hide');
                        $('.premium_b').remove();
                    }, 500);
                }else{
                    html ='<div class="alert alert-danger col-xs-12">';
                    html += mes.error;
                    html += '</div>';
                    if(mes.amountAdd){
                        html += '<div class="col-xs-12 margin-bottom-10"><a href="/user/finance" class="btn btn-success" >Add amount </a></div>';
                    }
                    $("#danger").html(html);
                }
            }
        })
    })
    
    var handleFileSelect = function(evt) {
        var files = evt.target.files;
        var file = files[0];
        var fileTypes = ['jpg', 'jpeg', 'png'];
        var extension = file.name.split('.').pop().toLowerCase();
        if (files && file) {
            isSuccess = fileTypes.indexOf(extension) > -1
            if (isSuccess) {
                var reader = new FileReader();
                reader.onload = function(readerEvt) {
                    var binaryString = readerEvt.target.result;
                    document.getElementById("user_image").src = "data:image/jpeg;base64,"+btoa(binaryString);
                    document.getElementById("fileUpload").innerHTML = '<input class="btn btn-save-changes"  type="submit" value="Сохранить">';
                };
                reader.readAsBinaryString(file);
            }else{
                    document.getElementById("fileUpload").innerHTML = '<div class="errorMessage">The file "'+file.name+'" cannot be uploaded. Only files with these extensions are allowed: jpg, gif, png.</div>';
            }
        }
    };
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        document.getElementById('UserImage_image').addEventListener('change', handleFileSelect, false);
    }

</script>