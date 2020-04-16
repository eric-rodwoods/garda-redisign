<?php
/**
 * Страница для вывода продукта с использованием шаблона Product.php
 */
?>

<?php if( is_single (array( 1283, 1285 )) ) { 
			get_header();
		} elseif ( is_single() ) {
			get_header('second');
		}	
?>

<?php if( is_single(1283) ) {
			require 'single-industrial.php';			
		} elseif ( is_single(1285) ) {
			require 'single-garazhnye.php'; 
		} elseif ( in_category( 107 ) ) {
			require 'templates/Product.php'; 
		} elseif ( in_category( 3 ) ) {
			require 'templates/Products2.php';
		}
?>

<?php get_footer(); ?>