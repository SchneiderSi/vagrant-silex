<?php
/**
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 */
$slots = $view['slots'];
?>


<?php $view->extend('layout.html.php') ?>

<?php $view['slots']->set('title', "Title") ?>

Hello <?= $name; ?>!