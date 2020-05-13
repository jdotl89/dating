<?php
// turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Start a session
session_start();

// require the autoload file
require_once('vendor/autoload.php');
require_once("model/data-layer.php");

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

    $gender = getGender();
    //$f3->reroute('/profile');
    //If the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //var_dump($_POST);

        //Store the data in the session array
        $_SESSION['first'] = $_POST['first'];
        $_SESSION['last'] = $_POST['last'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['phone'] = $_POST['phone'];
        $_SESSION['petName'] = $_POST['petName'];
        $_SESSION['petAge'] = $_POST['petAge'];
        $_SESSION['pGender'] = $_POST['pGender'];

        //Redirect to Order 2 page
        $f3->reroute('/profile');
    }

    $f3->set('gender', $gender);
    $f3->set('pGender', $gender);

    $view = new Template();
    echo $view->render('views/personal.html');
});

// profile
$f3->route('GET|POST /profile', function($f3) {

    $state = getStates();

    //If the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        var_dump($_SESSION);

        //Store the data in the session array
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['seek'] = $_POST['seek'];
        $_SESSION['bio'] = $_POST['bio'];

        //Redirect to Order 2 page
        $f3->reroute('/interests');
    }

    $f3->set('state', $state);

    $view = new Template();
    echo $view->render('views/profile.html');
});

// interest
$f3->route('GET|POST /interests', function($f3) {

    $indoor = getInDoor();
    $outdoor = getOutDoor();

    //If the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        var_dump($_POST);

        //Store the data in the session array
        $_SESSION['indoor'] = $_POST['indoor'];
        $_SESSION['outdoor'] = $_POST['outdoor'];

        //Redirect to Order 2 page
        $f3->reroute('/summary');
    }

    $f3->set('indoor', $indoor);
    $f3->set('outdoor', $outdoor);

    $view = new Template();
    echo $view->render('views/interests.html');
});

// summary
$f3->route('GET /summary', function() {
    //var_dump($_SESSION);
    //echo "Thank You!";
    //echo "<p>" . $_SESSION['pet'] . $_SESSION['pets'] . "</p>";

    $view = new Template();
    echo $view->render('views/summary.html');
    session_destroy();
});

// run fat free
$f3->run();
