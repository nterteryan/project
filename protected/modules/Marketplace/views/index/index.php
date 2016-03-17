<div class="col-md-12">
    <div class="heading referral_link">

    </div>

    <div class="heading">

    </div>
    <hr class="hr-dashed" />

    <div class=" profile">
        <h3 class="panel-title">Мой Профиль</h3>

        <div class="row personal-info">
            <div class="col-md-9">

            </div>
        </div>

        <div class="">
            <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'registration',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array(
                        'enctype' => 'multipart/form-data',
                    )
                ));
            ?>
            <div class="fileUpload" >
                <!-- <a href="#">Фото</a> -->
                <div id="fileUpload">

                </div>
                <?php
                echo $form->fileField($marketplace, 'image');
                echo $form->error($marketplace, 'image', array());
                ?>
            </div>

            <div class="form-group <?php echo HtmlHelper::hasError($marketplace, 'title'); ?>">
                <?php
                echo $form->labelEx($marketplace, 'title', array(
                    'class' => 'control-label'
                ))
                ?>
                <?php
                echo $form->textField($marketplace, 'title', array(
                    'class' => 'form-control'
                ));
                ?>
                <?php
                echo $form->error($marketplace, 'title', array(
                ))
                ?>
            </div>
            <div class="form-group <?php echo HtmlHelper::hasError($marketplace, 'description'); ?>">
                <?php
                echo $form->labelEx($marketplace, 'description', array(
                    'class' => 'control-label'
                ))
                ?>
                <?php
                echo $form->textField($marketplace, 'description', array(
                    'class' => 'form-control'
                ));
                ?>
                <?php
                echo $form->error($marketplace, 'description', array(
                ))
                ?>
            </div>
            <div class="form-group <?php echo HtmlHelper::hasError($marketplace, 'status'); ?>">
                <?php
                echo $form->labelEx($marketplace, 'status', array(
                    'class' => 'control-label'
                ))
                ?>
                <?php
                echo $form->textField($marketplace, 'status', array(
                    'class' => 'form-control'
                ));
                ?>
                <?php
                echo $form->error($marketplace, 'status', array(
                ))
                ?>
            </div>
            <div class="form-group action-buttons">
                <div class="buttons-right">
                    <input class="btn btn-save-changes" id="focusedInput" type="submit" value="Сохранить ">
                    <input class="btn btn-cancel" type="submit" value="Отмена">
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
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
                    document.getElementById("user_image").src = "data:image/jpeg;base64," + btoa(binaryString);
                    document.getElementById("fileUpload").innerHTML = '<input class="btn btn-save-changes"  type="submit" value="Сохранить">';
                };
                reader.readAsBinaryString(file);
            } else {
                document.getElementById("fileUpload").innerHTML = '<div class="errorMessage">The file "' + file.name + '" cannot be uploaded. Only files with these extensions are allowed: jpg, gif, png.</div>';
            }
        }
    };
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        document.getElementById('UserImage_image').addEventListener('change', handleFileSelect, false);
    }
</script>