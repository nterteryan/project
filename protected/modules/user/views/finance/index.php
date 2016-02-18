<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Ввод на лицевой счет</h3>
        </div>
        <div class="panel-body" id="charge">
            <div class='error-message'></div>
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'charge-balance',
            ));
            ?>
            <div class="form-group ">
                <?php
                echo $form->labelEx($userOrder, 'amount', array(
                    'class' => 'control-label',
                    'required' => true
                ));
                ?>
                <?php
                echo $form->numberField($userOrder, 'amount', array(
                    'class' => 'form-control',
                    'value' => UserCertificate::MINIMUM_COUNT,
                ));
                ?>
            </div>
            <div class="modal-footer">
                <button  type="button" class="btn btn-primary" onclick="User.chargeBalance(event, this)">Пополнить</button>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>