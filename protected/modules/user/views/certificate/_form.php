<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'form',
        ));
?>
<div class="form-group ">
    <?php
    echo $form->labelEx($userCertificate, 'count', array(
        'class' => 'control-label',
        'required' => true
    ))
    ?>
    <?php
    echo $form->textField($userCertificate, 'count', array(
        'class' => 'form-control',
        'value' => '',
    ));
    ?>
    <div class='errorMessage hidden'></div>
</div>
</div>
<div class="modal-footer">
    <button id='change-password-submit' type="button" class="btn btn-primary">Купить</button>
</div>
<?php $this->endWidget(); ?>