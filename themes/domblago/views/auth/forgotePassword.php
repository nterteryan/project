<div class="page-header" id="banner">
    <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-6">
            <h1>Забыли Парол?</h1>
            <p>Введите электронную почту чтобы получить ссылку для сброса пароля</p>
        </div>
    </div>
</div>
<div class="bs-docs-section clearfix">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Форма</h3>
        </div>
        <div class="panel-body">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'registration'
            ));
            ?>
            <div class="form-group <?php echo $error ? 'has-error' : ''; ?>">
                <?php
                echo CHtml::label('Электронная Почта', 'email', array(
                    'class' => 'control-label'
                ))
                ?>
                <?php
                echo CHtml::emailField('email', '', array(
                    'id' => 'email',
                    'class' => 'form-control'
                ));
                ?>
                <?php if ($error) { ?>
                    <div class='errorMessage'><?php echo $error; ?></div>
                <?php } ?>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" id="focusedInput" type="submit" value="Готово">
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>