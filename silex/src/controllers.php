<?php
use Symfony\Component\HttpFoundation\Request;

/**
 * @var $app\SilexApplication
 */

$app->get('/home', function () use ($app) {
    return $app['templating']->render(
        'home.html.php'

        //assoc Array könnte hier auch stehen
    );
});

$app->get('/blog', function () use ($app) {
    return $app['templating']->render(
        'blog.html.php'
    );
});

$app->get('/new', function () use ($app) {
    return $app['templating']->render(
        'new.html.php'
    );
});