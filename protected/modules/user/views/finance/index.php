<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Ввод на лицевой счет</h3>
    </div>
    <div class="panel-body">
        <p>Лицевой счет, это по сути Ваш кошелек в МБО Дом Блага.
        Он служит для оплаты любого товара и услуги в данном проекте.
        Для того, что бы оплатить пакеты "Легкий старт", "Быстрый старт" или приобрести акции 
        FPA, FPE, FPM, MBO и др., Вам необходимо сначала пополнить свой баланс внешними платежными системами (в настоящий момент это Perfekt Money), далее оплата выбранного Вами продукта, производиться с Вашего лицевого счета.
        </p>
        <p>
            <b>Примечание.</b> Покупка пакетов "Легкий старт", "Быстрый старт", также можно оплатить на прямую с платежной системы Perfekt Money.
        </p>
    </div>
    <div class="panel-body" id="charge">
        <div class='error-message'></div>
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'charge-balance',
        )); ?>
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