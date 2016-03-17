<div class="col-md-12">
    <hr class="hr-dashed" />
    <div class="row certificate_projects">
        <h2>Мои инвестиции</h2>
        <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-10">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'dataProvider' => $arrayDataProvider,
                    'columns' => array(
                        array(
                            'name' => 'Имя',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->tariff["name"])',
                        ),
                        array(
                            'name' => 'Начальный Взнос',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data["amount"]." $")',
                        ),
                        array(
                            'name' => 'Доход',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data["amount_percent"]." $" )',
                        ),
                        array(
                            'name' => 'Осталось',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data->gettimeofday()." дней")',
                        ),
                        array(
                            'name' => 'Начало',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data["created_date"])',
                        ),
                        array(
                            'name' => 'Статус',
                            'type' => 'raw',
                            'value' => function($data, $row) {
                                if ($data->status == "CLOSED")
                                    return CHtml::link("Заказать Деньги", "#", array("class" => "btn btn-default closedTariff", "data-id" => $data["id"]));
                                else
                                    return "В процессе";
                            }
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{lookingDay}',
                            'buttons' => array(
                                'lookingDay' => array(
                                    'label' => 'Получить доход',
                                    'url' => '"#"',
                                    'visible' => 'DateComponent::lookingDay("Mon") && $data["amount_percent"] > 0',
                                    'url' => '$data->id',
                                    'options' => array(
                                        'class' => 'btn btn-default sendPercent',
                                    ),
                                ),
                            )
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{REFUND}',
                            'buttons' => array(
                                'REFUND' => array(
                                    'label' => 'ВОЗВРАТ',
                                    'url' => '"#"',
                                    'visible' => '$data->isVisibleRefund() && $data["amount_percent"] > 0',
                                    'url' => '$data->id',
                                    'options' => array(
                                        'class' => 'btn btn-default sendRefund',
                                    ),
                                ),
                            )
                        )
                    ),
                ));
                ?>
            </div>
            <div class="col-xs-1"></div>
        </div>	
    </div>
</div>
<div class="col-md-12">
    <hr class="hr-dashed" />
    <div class="row certificate_projects">
        <h2>Инвестиции</h2>
        <?php foreach ($tariffs as $tariff) : ?>
        <?php $percent = $tariff->getPercentageByUserType($userType); ?>
            <div class="col-lg-6 col-md-12 ">
                <div class="certificate" id="box-<?php echo $tariff->id; ?>">
                    <div class="header-box">
                        <h4 class="<?php echo strtolower($tariff->name); ?>"><?= $tariff->name ?> </h4>
                        <div class="">количество <span><?php echo $tariff->amount ?>$</span></div>
                        <div class="">срок  <span><?php echo $tariff->close_month ?> месяц</span></div>
                        <div class="unit">процент <span><?php echo $percent; ?>%</span></div>
                    </div>
                    <div class="certificate-title"><?php echo $tariff->description; ?></div>
                    <div class="text-center">
                        <a href="#" data-toggle="modal" data-target="#myModal" data-id="<?php echo $tariff->id; ?>" data-close_month="<?php echo $tariff->close_month; ?>" data-amount="<?php echo $tariff->amount; ?>"data-percent="<?php echo $percent; ?>" class="btn btn-certificate-choose btn_tariff">Выбрать</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <div id="danger">

                </div>
                <div class="form-group ">
                    <label class="control-label required" for="sendPin">PIN:<span class="required">*</span></label>
                    <input class="form-control"  id="sendPin" type="password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
                <button type="button" class="btn btn-info " id="btn_modalTr" >Подтвердить</button>
            </div>
        </div>
    </div>
    <!-- endModal	-->
</div>