<?php
$page = Data::getPageType();
if (!is_null($page)) {
	require 'page_'.$page.'.php';
} else {
	require '404.php';
}