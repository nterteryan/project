<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Мои Сертификаты</h3>
    </div>
    <div class="panel-body">
        <?php $this->widget('application.widgets.userCertificate.UserCertificates') ?>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Выберите тип Сертификата который хотите купиь</h3>
    </div>
    <div class="panel-body">
        <?php foreach ($certificates as $certificate) : ?>
            <div class="col-lg-6 col-md-12">
                <div class="certificate" id="box-<?php echo $certificate->id; ?>">
                    <h4><?php echo $certificate->name; ?></h4>
                    <div class="text-bold"><?php echo $certificate->description; ?></div>
                    <div><?php echo $certificate->more_description; ?></div>
                    <a href="#" data-id="<?php echo $certificate->id; ?>" class="btn btn-primary certificate-choose">Выбрать</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>