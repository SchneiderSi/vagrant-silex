<?php
/**
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 * @var $post
 * @var $singlePost
 * @var $view
 */
$slots = $view['slots'];


$view->extend('layout.html.php');

if ($singlePost != NULL) { ?>
    <!-- show a single blogentry if $singlePost array is filled with one-->
    <div class="page-header">
        <h1>Dein ausgewählter Blogeintrag:</h1>
        <form method="get" action="/blog">
            <button type="submit" class="btn btn-lg btn-success">Zurück</button>
        </form>
    </div>
    <div class="list-group-item">
        <h4 class="list-group-item-heading"><?= $singlePost['title'] ?></h4>
        <p class="list-group-item-text"><?= $singlePost['text'] ?></p>
        <br/>
        <p class="list-group-item-text right">
            <i><?= $singlePost['created_at'] . (isset($singlePost['author']) ? ' von ' . $singlePost['author'] : '') ?></i>
        </p>
    </div>
<?php } else { ?>
    <!-- show all entries of the database -->
    <div class="page-header">
        <h1>Alle Blogeinträge<br>
            <small>Klicke auf einen Blogeintrag um ihn vollständig anzuzeigen</small>
        </h1>
    </div>
    <div class="list-group">
        <?php foreach ($post as $value) { ?>
            <a class="list-group-item" href="blog/<?= $value['id'] ?>">
                <h4 class="list-group-item-heading"><?= $value['title'] ?></h4>
                <p class="list-group-item-text"><?= substr($value['text'], 0, 80) ?> [...]</p>
                <br/>
                <p class="list-group-item-text right">
                    <i><?= $value['created_at'] . ' von ' . $value['author'] ?></i>
                </p>
            </a>
        <?php } ?>
    </div>
<?php } ?>



