<?php
/**
 * Страница для показа категорий
 */
?>

<?php get_header('second'); ?>

<?php $template = Category::getTemplate(); ?>
<?php require "templates/$template.php"; ?>

<?php get_footer(); ?>