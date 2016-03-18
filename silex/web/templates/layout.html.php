<?php
/**
 * @var $app\SilexApplication
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 * @var $title
 * @var $active
 * @var $cookieSet
 * @var $notFilled
 */
$slots = $view['slots'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- create the navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">Blog</div>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!-- show which page is on at the moment -->
                <li <?= $active == 'home' ? 'class="active"' : '' ?>><a href="/home">Home</a></li>
                <li <?= $active == 'blog' ? 'class="active"' : '' ?>><a href="/blog">Alle Blogeinträge</a></li>
                <li <?= $active == 'new' ? 'class="active"' : '' ?>><a href="/new">Neuer Eintrag</a></li>
            </ul>
            <!-- if cookie is set show the logout button else show the login field -->
            <?php if ($cookieSet) { ?>
                <form method="post" action="/logout">
                    <div class="nav navbar-nav navbar-right">
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </div>
                </form>
            <?php } else { ?>
                <!-- form for $username -->
                <form id="signin" class="navbar-form navbar-right" method="post" action="/login">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="username" class="form-control" name="username"
                               placeholder="Username">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            <?php } ?>
            <!-- ifEnd -->

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="row-sm-12">
        <!-- Warning appears when login button is clicked but no username is in the field -->
        <?= $notFilled == true ? '<div class="alert alert-danger"><strong>Bitte Username Eingeben</strong></div>' : '' ?>
        <!-- content of new, home or blog comes here -->
        <?php $slots->output('_content') ?>

    </div>
</div>
<!-- creates the footer -->
<footer class="footer">
    <div class="container">
        <div class="well  well-sm">
            <p class="text-muted">written by Simone Schneider, March 2016</p>
        </div>
    </div>
</footer>
</body>
</html>