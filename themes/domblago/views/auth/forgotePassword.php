<div class="row">
    <div class="col-lg-12">
        <h1 class="page_title">Забыли Парол?</h1>
        <p class="page_sub_title">Введите электронную почту чтобы получить ссылку для сброса пароля</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-lg-offset-2 auth_inner_bg">
        <div class="panel-body">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'registration'
            ));
            ?>
            <div class="form-group <?php echo $error ? 'has-error' : ''; ?>">
                
                <?php
                echo CHtml::emailField('email', '', array(
                    'id' => 'email',
                    'class' => 'form-control',
                    'placeholder'=> 'Электронная Почта',
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