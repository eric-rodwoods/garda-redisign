<?php
require_once($_SERVER['DOCUMENT_ROOT']."/wp-load.php");

define('TEMPLATE', "<p><span style=\"font-weight: bold;\">%text%:</span> %value%</p>\r\n");

function tempalte($text = '', $value = '') {
	return preg_replace('#%text%#', $text, preg_replace('#%value%#', $value, TEMPLATE));
}

function get($name, $default = '') {
	return isset($_POST[$name]) && $_POST[$name] != '' ? htmlspecialchars($_POST[$name]) : $default;
}

function getMessage(array $array){
	$res = '';
	foreach ($array as $text => $value) {
		if ($value != '') {
			$res .= tempalte($text,$value);
		}
	}
	return $res;
}

$to = 'sale@garda-group.ru';
// $cc = '';
$bcc = 'ns.avikey@gmail.com';

$site = $_SERVER['HTTP_HOST'];
$error = false;
$result = array();

$type = get('type',null);
$name = get('name',null);
$phone = get('phone',null);
$link = get('link',null);
$email_1 = get('email-1',null);
$email_2 = get('email-2',null);

if ( is_null($type) ) {
	$error = true;
	$result['status'] = 'error';
	$result['text'] = '<br>Не заполнены обязательные поля.';
}

if (!$error) {

// feedback, dicount, dicount-2, freind, consult, zamer
	$headers = "Content-type: text/html; charset=utf-8 \r\n";
	$headers .= isset($cc) && $cc != '' ? "Cc:" . $cc . "\r\n" : '';
	$headers .= isset($bcc) && $bcc != '' ? "Bcc:" . $bcc . "\r\n" : '';

	if ($type == 'zayavka') {
		$subject = "Заказ обратного звонка $site";
		$message = getMessage(array(
			'Имя' => $name,
			'Телефон' => $phone
		));
	} else if ($type == 'skidka15') {
		$subject = "Скидка на монтаж 15% при заказе гражных секционных ворот $site";
		$message = getMessage(array(
			'Имя' => $name,
			'Телефон' => $phone
		));
	} else if ($type == 'skidka-nashli-deshevle') {
		$subject = "Нашли дешевле $site";
		$message = getMessage(array(
			'Имя' => $name,
			'Телефон' => $phone
		));
	} else if ($type == 'consalt') {
		$subject = "Заявка на консультацию с сайта $site";
		$message = getMessage(array(
			'Имя' => $name,
			'Телефон' => $phone
		));
	} else if ($type == 'zamer') {
		$subject = "Заявка на замер с сайта $site";
		$message = getMessage(array(
			'Имя' => $name,
			'Телефон' => $phone
		));
	} else if ($type == 'recomend') {
		$to = $email_2;
		$subject = "Ваш друг с e-mail-адресом $email_1 рекомендовал Вам сайт $site";
		$message = "<p>Ваш друг с e-mail-адресом $email_1 рекомендовал Вам сайт <a href=\"http://$site\">$site</a><br><br>Осуществите заказ на сайте, и вы оба получите подарок от компании «Гарда»!<br><br>С уважением,<br>компания «Гарда»,<br>ограждающие подвижные конструкции<br>+7 (473) 232 43 30</p>";
	}


	if (wp_mail($to, $subject, $message, $headers)) {
		$result['status'] = 'success';
		$result['data'] = array(
			'type' => $type
		);
	} else {
		$result['status'] = 'error';
		$result['text'] = '<br>Ошибка сервера при отправке письма.';
	}
}

echo json_encode($result);
