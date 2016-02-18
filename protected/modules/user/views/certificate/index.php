<div class="col-md-12">
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
            <h3 class="panel-title">Методы Оплат</h3>
        </div>
        <div class="panel-body">
            <p>В момент привязки платежной системы к порталу, Вы можете делать оплату на указанные счета. Подтвердить перевод путем сканирования или снимка скрин шот отправить на почту domblaga@gmail.com 
                Тема письма Оплата пакета (Легкий старт, или Быстрый старт)</p>
            <p>Указать фамилию и почту свою</p>
            <p><b>Пример:</b> Иванов Иван Почта ivanov@ivanov.ru</p>
            <p>Оплата пакета Быстрый старт. Выписка о оплате прикреплена</p>
            <ul>
                <li>Qiwi  +380932551001</li>
                <li>Яндекс Деньги Номер кошелька 410011214467945</li>
                <li>Приват Банк грн : 4149 4978 4133 1319 (Гайдамака Елена Григорьевна)</li>
                <li>Сбербанк руб 4276310020482784 (Шульга Григорий Анатольевич)</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Выберите тип Сертификата который хотите купиь</h3>
        </div>
        <div class="panel-body clearfix">
            <div class="clearfix">
                <div class="col-lg-12 col-md-12">
                    <h4>Сертификаты можно купить с лицевого счета.</h4>
                    <div>
                        Выберите тип Сертификата который хотите купиь.
                        Стоимость любого сертификата 1$.
                        Миниальная покупка 5 шт.
                    </div>
                </div>
            </div>
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
</div>