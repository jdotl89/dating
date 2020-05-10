<?php
// turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

// require the autoload file
require_once('vendor/autoload.php');

// create an instance of the base class
$f3 = Base::instance();

// define a default route
$f3->route('GET /', function() {
    //echo '<h1>Hello world!</h1>';

    $view = new Template();
    echo $view->render('views/home.html');
});

// personal
$f3->route('GET|POST /personal', function($f3) {

    //$f3->reroute('/profile');

    $view = new Template();
    echo $view->render('views/personal.html');
});

// profile
$f3->route('GET|POST /profile', function() {

    $view = new Template();
    echo $view->render('views/profile.html');
});

// interest
$f3->route('GET|POST /interests', function() {

    $view = new Template();
    echo $view->render('views/interests.html');
});

// summary
$f3->route('GET|POST /summary', function() {
    //var_dump($_SESSION);
    //echo "Thank You!";
    //echo "<p>" . $_SESSION['pet'] . $_SESSION['pets'] . "</p>";

    $view = new Template();
    echo $view->render('views/summary.html');
    //session_destroy();
});

// run fat free
$f3->run();
