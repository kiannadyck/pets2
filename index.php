<?php
/**
 * Created by PhpStorm.
 * User: Jen Shin
 * Date: 1/18/18
 * Time: 10:36 AM
 */
//require the autoload file
require_once ('vendor/autoload.php');



//create an instance of Base class
$f3 = Base::instance();

$f3->set('DEBUG', 3);

//define page1 route
$f3->route('GET /', function() {
    echo '<h1>This is default</h1>'; //testing purposes

    //$view = new View();
    //echo $view -> render('views/home.hmtl');
}
);
$f3->run();