<?php
use Symfony\Component\HttpFoundation\Request;

/**
 * @var $app\SilexApplication
 * @var $dbConnection Doctrine\DBAL\Connection
 * @var $template Symfony\Component\Templating\DelegatingEngine
 */
$template = $app['templating'];
$dbConnection = $app ['db'];

// get method for /home page
// reads cookie and checks if it is set or not
// returns home.html.php with 4 variables
// active for navigation
// title to show the name of the page
// cookieSet to see the login field or the logout button
// notFilled to check if you have filled the username field
// those 4 and the cookie check are equal for all methods
$app->get('/home', function () use ($app, $template) {
    $username = $app['session']->get('user');

    ($username['username'] != NULL) ? $cookieSet = true : $cookieSet = false;

    return $template->render(
        'home.html.php',
        array('active' => 'home',
            'title' => 'Home',
            'cookieSet' => $cookieSet,
            'notFilled' => false)
    );
});

// there is no login.html.php, its just for managing the login process
// if login button is clicked this function is called
// checks if someone has entered his name
// case name entered: cookie is created, cookieSet is true and not filled is false
// user is logged in and forwarded to home.html.php
// case button clicked and no name entered:
// cookieSet is false and not filled is true (for warning)
$app->post('/login', function (Request $request) use ($app, $template) {

    $username = $request->get('username');

    if ($username != NULL) {
        $app['session']->set('user', array('username' => $username));

        $cookieSet = true;
        $notFilled = false;

        return $template->render(
            'home.html.php',
            array('active' => 'home',
                'title' => 'Home',
                'cookieSet' => $cookieSet,
                'notFilled' => $notFilled)
        );
    } else {
        $cookieSet = false;
        $notFilled = true;

        return $template->render(
            'home.html.php',
            array('active' => 'home',
                'title' => 'Home',
                'cookieSet' => $cookieSet,
                'notFilled' => $notFilled)
        );
    }
});

// Button in Navbar logout is clicked
// delete cookie an redirect with home (the log in field is shown again)
$app->post('/logout', function (Request $request) use ($app, $template) {
    $app['session']->clear();
    return $app->redirect('/home');
});

// all entrys are selected from SQL blog_post an written in $post
// singlePost is for later to show a single entry by clicking on it
$app->get('/blog', function () use ($app, $template, $dbConnection) {
    $username = $app['session']->get('user');
    $sql = "SELECT * FROM blog_post";
    $post = $dbConnection->fetchAll($sql);
    $singlePost = NULL;

    ($username['username'] != NULL) ? $cookieSet = true : $cookieSet = false;

    return $template->render(
        'blog.html.php',
        array('active' => 'blog',
            'title' => 'Blog',
            'singlePost' => $singlePost,
            'post' => $post,
            'cookieSet' => $cookieSet,
            'notFilled' => false)
    );
});

// to show one single Blog entry
// singlePost is filled with the entry of the $id
$app->get('/blog/{id}', function ($id) use ($app, $template, $dbConnection) {

    $username = $app['session']->get('user');
    $singlePost = $dbConnection->fetchAssoc('SELECT * FROM blog_post WHERE id =' . $id . '', array(1));

    ($username['username'] != NULL) ? $cookieSet = true : $cookieSet = false;

    return $template->render(
        'blog.html.php',
        array('active' => 'blog',
            'title' => 'Blog',
            'singlePost' => $singlePost,
            'cookieSet' => $cookieSet,
            'notFilled' => false)
    );
});


// to create new Blog entries
$app->match('/new', function (Request $request) use ($app, $dbConnection, $template) {
    // if error = 0 there's no alert (success or warning) shown
    $username = $app['session']->get('user');
    $error = 0;

    ($username['username'] != NULL) ? $cookieSet = true : $cookieSet = false;
    //get method
    if ($request->isMethod('GET')) {
        return $template->render(
            'new.html.php',
            array(
                'active' => 'new',
                'title' => 'New',
                'error' => $error,
                'cookieSet' => $cookieSet,
                'notFilled' => false)
        );
    }
    //post method
    if ($request->isMethod('POST')) {
        $head = $request->get('title');
        $entry = $request->get('blogEntry');
        $username = $app['session']->get('user');

        // checks if both title and entry field are filled and if someone is logged in
        // in case of all 3 are true a new database entry is created and the error is set on 2, which means that
        // everythings ok
        if ($head and $entry and $cookieSet) {
            $error = 2;

            $dbConnection->insert(
                'blog_post',
                array(
                    'author' => $username['username'],
                    'title' => $head,
                    'text' => $entry,
                    'created_at' => date("Y-m-d H:i:s", time())
                )
            );

            return $template->render(
                'new.html.php',
                array(
                    'active' => 'new',
                    'title' => 'New',
                    'error' => $error,
                    'cookieSet' => $cookieSet,
                    'notFilled' => false)
            );
        } else {
            // error one means that theres an alert because not all fields have been filled or you aren't logged in
            $error = 1;

            return $template->render(
                'new.html.php',
                array(
                    'active' => 'new',
                    'title' => 'New',
                    'error' => $error,
                    'cookieSet' => $cookieSet,
                    'notFilled' => false)
            );
        }
    }
});

