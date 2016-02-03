<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-' . $certificate->id,
)); ?>
<div class="form-group ">
    <?php
    echo $form->labelEx($userCertificate, 'count', array(
        'class' => 'control-label',
        'required' => true
    ));
    ?>
    <?php
    echo $form->numberField($userCertificate, 'count', array(
        'class' => 'form-control',
        'value' => UserCertificate::MINIMUM_COUNT,
    ));
    ?>
    <?php
    echo $form->hiddenField($userCertificate, 'certificate_id', array(
        'class' => 'form-control',
        'value' => $certificate->id,
    ));
    ?>
</div>
<div class='error-message-<?php echo $certificate->id; ?>' ></div>
</div>
<div class="modal-footer">
    <button data-id="<?php echo $certificate->id; ?>" type="button" class="btn btn-primary" onclick="User.addByCertificate(event, this)">Купить</button>
</div>
<?php $this->endWidget(); ?>