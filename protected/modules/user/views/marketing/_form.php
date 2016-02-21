Введите пин код для потверждения:
<?php echo CHtml::textField('pin_code', '', array('class' => 'pin-code-field', 'size' => 10,'maxlength'=>4)); ?>
<button data-id="<?php echo $marketing->id; ?>" class="check-pin btn btn-primary" onclick="User.enterToMarketingPlan(event, this)">Потвердить</button>
<br />
<div class="message-box"></div>