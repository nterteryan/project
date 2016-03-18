<div class="col-md-12">
    <div class="heading referral_link">

    </div>

    <div class="heading">

    </div>
    <hr class="hr-dashed" />

    <div class=" profile">
        <h3 class="panel-title">Мой категории</h3>

        <div class="row personal-info">
            <div class="col-md-12">
               <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'itemsCssClass' => 'table cat_table',
                    'dataProvider' => $arrayDataProvider,
                    'columns' => array(
                        array(
                            'name' => 'title',
                            'type' => 'raw',
                            'value' => 'CHtml::encode($data["title"])',
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{editCat}{deleteCat}',
                            'buttons' => array(
                                'editCat' => array(
                                    'label' => 'редактировать',
                                    'visible' => 'true',
                                    'url' => '$data->id',
                                    'options' => array(
                                        'class' => 'btn btn-default editCat',
                                    ),
                                ),
                                'deleteCat' => array(
                                    'label' => 'Удалить',
                                    'visible' => 'true',
                                    'url' => '$data->id',
                                    'options' => array(
                                        'class' => 'btn btn-default deleteCat',
                                    ),
                                ),
                            )
                        ),
                    ),
                ));
               ?>
            </div>
            <div class="col-md-12">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id'                   => 'catForm',
            'enableAjaxValidation' => false,
    
        ));
        ?>
        <div class="form-group <?php echo HtmlHelper::hasError($category, 'title'); ?>">
            <?php
            echo $form->labelEx($category, 'title', array(
                'class' => 'control-label'
            ))
            ?>
            <?php
            echo $form->textField($category, 'title', array(
                'class' => 'form-control'
            ));
            ?>
            <?php
            echo $form->error($category, 'title', array(
            ))
            ?>
        </div>
        <div class="form-group <?php echo HtmlHelper::hasError($category, 'icone'); ?>">
            <?php
            echo $form->labelEx($category, 'icone', array(
                'class' => 'control-label'
            ))
            ?>
            <?php
            echo $form->textField($category, 'icone', array(
                'class' => 'form-control'
            ));
            ?>
            <?php
            echo $form->error($category, 'icone', array(
            ))
            ?>
        </div>
        <div id="catFormId">
            
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

        <div class="">
            <br>
        </div>
    </div>
</div>