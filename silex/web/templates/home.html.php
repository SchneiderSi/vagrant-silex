<?php
/**
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 */
$slots = $view['slots'];
?>


<?php $view->extend('layout.html.php') ?>



<div class="container"> <!-- wichtig< ?php $view['slots']-> set('title','home')?> -->

    <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
    </div>

</div><!-- /.container -->

<div class="col-lg-8 hidden-xs col-lg-offset-2">
    <div class="jumbotron">
        <h1> Hallo Welt!</h1>
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut <br/>
        <button type="button" class="btn btn-lg btn-primary">Und los</button>
    </div>
</div>
</div>

<div class="row"> <!-- wichtig -->
    <div class="col-md-6 col-lg-4"> <!-- wichtig -->
        <div class="panel panel-default">
            <ul class="list-group">
                <li class="list-group-item list-group-item-info ">Cras justo odio</li>
                <li class="list-group-item list-group-item-danger">Dapibus ac facilisis in</li>
                <li class="list-group-item list-group-item-warning">Morbi leo risus</li>
                <li class="list-group-item list-group-item-success">Porta ac consectetur ac</li>
            </ul>
        </div>
    </div>
</div>
