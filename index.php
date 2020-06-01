<?php
// turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

// require the autoload file
require_once('vendor/autoload.php');
require_once("model/data-layer.php");
//require_once("model/validation.php");
//require_once("classes/member.php");
//require_once("classes/premiumMember.php");

//Start a session
session_start();

// create an instance of the base class
$f3 = Base::instance();
$validator = new Validation();
$controller = new Controller($f3, $validator);

// define a default route
$f3->route('GET /', function() {
    $GLOBALS['controller']->home();
});

// personal
$f3->route('GET|POST /personal', function() {
    $GLOBALS['controller']->personal();
});

// profile
$f3->route('GET|POST /profile', function() {
    $GLOBALS['controller']->profile();
});

// interest
$f3->route('GET|POST /interests', function() {
    $GLOBALS['controller']->interests();
});

// summary
$f3->route('GET /summary', function() {
    $GLOBALS['controller']->summary();
});

// run fat free
$f3->run();