<?php
/*
Template Name: Контакты
*/
?>
<?php get_header(); ?>
    <?php $address = preg_replace('#\<br\s/\>#', '', Contact::getInstance()->getParam('address')); ?>
    <?php $prefix = Contact::getInstance()->getParam('phone_prefix'); ?>
    <?php $phone = Contact::getInstance()->getParam('number_phone'); ?>
    <?php $email = Contact::getInstance()->getParam('email'); ?>
    <?php $time = Contact::getInstance()->getParam('time'); ?>
    <?php $bank_details = Contact::getInstance()->getParam('bank_details'); ?>
    <?php $coordinates = Contact::getInstance()->getParam('coordinates'); ?>
    <?php $scheme = Contact::getInstance()->getParam('scheme'); ?>
    <section class="content container">
        <p class="breadcrumbs"><?= Data::getBreadcrumbs(NULL) ?></p>
    </section>
<?php if ($coordinates): ?>
    <section id="map-container" class="container">
        <div id="map-header"><p>Приезжайте и заказывайте</p></div>
        <div class="wrap-print">
            <a class="print" href="/print-map.html" target="_blank">Распечатать</a>
        </div>
        <div id="map"></div>
    </section>
    <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>;
    <script type="text/javascript">
        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                    center: [<?= $coordinates ?>],
                    zoom: 16
            });
            myMap.controls.remove('fullscreenControl');
            myMap.controls.remove('typeSelector');
            myMap.controls.remove('scaleline');
            myMap.controls.remove('searchControl');
            myMap.controls.remove('trafficControl');
            myMap.controls.remove('smallZoomControl');
//                myMap.controls.remove('zoomControl');
            myMap.controls.remove('geolocationControl');

            var placemark = new ymaps.Placemark([<?= $coordinates ?>],{hintContent: ''},{iconLayout:'default#image',iconImageHref: '/wp-content/themes/garda/img/icon/bulet.png',iconImageSize:[23,41],iconImageOffset: [-11,-41]});
            myMap.geoObjects.add(placemark);
        });
    </script>
<?php endif; ?>
    <section class="contact container">
        <p class="header">Наш адрес<hr></p>
        <div class="text">
            <p><?= $address ?></p>
        <?php if ($prefix && $phone): ?>
            <p>Тел.: <?= $prefix ?> <?= $phone ?></p>
        <?php endif; ?>

        <?php if ($email): ?>
            <p>Почта: <a href="mailto:<?= $email ?>"><?= $email ?></a></p>
        <?php endif; ?>

        <?php if ($time): ?>
            <p>Время работы: <?= $time ?></p>
        <?php endif; ?>
        </div>
    <?php if ($bank_details): ?>
        <p class="header">Наши реквизиты<hr></p>
        <div><?= $bank_details; ?></div>
    <?php endif; ?>
	</section>    

    <?php if ($scheme): ?>
        <section id="scheme" class="contact container">
            <p class="header">Схема проезда</p>
            <a class="print" href="/print-scheme.html" target="_blank">Распечатать</a>
			<img class="scheme" src="<?= $scheme['sizes']['962xauto'] ?>">
        </section>
    <?php endif; ?>
	<script src="/wp-content/themes/garda/js/plugins/jquery.printElement.js" type="text/javascript"></script>

<?php
	get_footer();
?>