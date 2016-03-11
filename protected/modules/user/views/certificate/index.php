<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Мои Сертификаты</h3>
        </div>
        <div class="panel-body">
            <?php $this->widget('application.widgets.userCertificate.UserCertificates') ?>
        </div>
    </div>
    <hr class="hr-dashed" />
    
    <div class="row certificate_projects">        
        <h2>Проекты</h2>
        <?php foreach ($certificates as $certificate) : ?>
            <div class="col-lg-6 col-md-12 ">
                <div class="certificate" id="box-<?php echo $certificate->id; ?>">
                    <div class="header-box">
                        <h4 class="<?php echo strtolower($certificate->name); ?>"> </h4>
                        <div class="unit">единица: <span>$1</span></div>
                    </div>

                    <div class="certificate-title"><?php echo $certificate->description; ?></div>
                    <div class="certificate-descripton"><?php echo $certificate->more_description; ?></div>
                    <div class="text-center">
                        <a href="#" data-id="<?php echo $certificate->id; ?>" class="btn btn-certificate-choose certificate-choose">Выбрать</a>
                    </div>            
                </div>
            </div>
        <?php endforeach; ?>
        
    </div>
</div>