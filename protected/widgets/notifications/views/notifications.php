<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <span class="badge">0</span>
        <?php
        echo CHtml::image(APP_THEME_URL . '/img/icons/bell.png', 'Notifications', array(
        ))
        ?>
    </a>
    <ul class="dropdown-menu" aria-labelledby="themes">
        <li><a href="/user/dashboard">На данный момент уведомлений нету</a></li>
    </ul>
</li>