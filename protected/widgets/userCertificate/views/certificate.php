<ul class="w-user-amount-nav nav nav-pills block-right">
    <?php foreach ($userCertificates as $userCertificate) : ?>
        <li class="active"><a href="#"><?php echo $userCertificate->certificate->name; ?>
            <span class="badge"><?php HtmlHelper::displayAmount($userCertificate->count, ''); ?></span></a>
        </li>
    <?php endforeach; ?>
</ul>
