<?php
/**
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 */
$slots = $view['slots'];
?>


<?php $view->extend('layout.html.php') ?>

<div class="col-lg-9 hidden-xs col-lg-offset-2">
    <div class="jumbotron">
        <h1>Herzlich Willkommen !</h1>
        <form method="get" action="/blog">
            <button type="submit" class="btn btn-lg btn-primary">alle Blogeinträge</button>
        </form>
    </div>
</div>




