<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Моя рефферальная ссылка</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <?php
            echo CHtml::urlField('', $model->refferalUrl, array(
                'class' => 'form-control',
            ));
            ?>
        </div>
    </div>
</div>