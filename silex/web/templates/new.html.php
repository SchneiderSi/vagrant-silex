<?php
/**
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 * @var $error ;
 */
$slots = $view['slots'];

$view->extend('layout.html.php');

?>

<div class="page-header">
    <h1>Erstelle hier Deinen neuen Eintrag</h1>
</div>
<!-- success or warning alert, tried doing it with the shorter if version -> looked ugly as well -->
<?php if ($error == 1) { ?>
    <div class="alert alert-danger">
        <strong>Bitte alle Felder ausfüllen und einloggen</strong>
    </div>
<?php } else if ($error == 0) {

} else if ($error == 2) { ?>
    <div class="alert alert-success">
        <strong>Der Eintrag wurde erfolgreich erstellt !</strong>
    </div>
<?php } ?>

<!-- form for new entry -->
<div class="col-sm-8">
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <span class="label label-info">Titel</span>
            <input type="text" class="form-control" id="titleBlog" name="title" placeholder="Titel des Blogs"/>
            <span class="label label-info">Dein Blogeintrag</span>
            <textarea class="form-control" name="blogEntry" rows="3" id="entryBlog"
                      placeholder="Blogeintrag"></textarea>
            <button type="submit" class="btn btn-primary">Absenden</button>
        </div>
    </form>
</div>

