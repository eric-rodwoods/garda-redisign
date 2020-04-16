<?php
/**
 * Страница для вывода продукта с использованием шаблона Product.php
 */
?>

<?php if( is_single (array( 213, 231 )) ) { 
		get_header();
	} elseif ( is_single() ) {
		get_header('second');
	}	
?>

<?php if( is_single( 213 ) ) { 
			require 'single-garazhnye.php'; 
		} elseif ( is_single(231) ) {
			require 'single-industrial.php';
		} else {
			require 'templates/Product.php'; 
		}	
?>

<?php get_footer(); ?>