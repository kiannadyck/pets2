<?php
/**
 * Created by PhpStorm.
 * User: Jen Shin
 * Date: 1/18/18
 * Time: 10:36 AM
 */
//require the autoload file
session_start();

require_once ('vendor/autoload.php');



//create an instance of Base class
$f3 = Base::instance();

$f3->set('DEBUG', 3);

//define page1 route
$f3->route('GET /', function() {
    //echo '<h1>This is default</h1>'; //testing purposes


   $view = new View();
   echo $view -> render('views/home.html');
}
);

//define a new route
$f3->route('GET /pets/show/@type', function($f3,$params) {
    //echo '<h1>This is default</h1>'; //testing purposes
    switch($params['type'])
    {
        case 'cat':
            echo 'imagecat!';
            break;
        case 'dog':
            echo 'imagedog!';
            break;
        default:
            $f3->error(404);

            $view = new View();
            echo $view->render('views/home.html');

    }
}
);

$f3->route('GET /order', function() {
    //echo '<h1>Form 1</h1>'; //testing purposes

    $view = new View();
    echo $view -> render('views/order.html');
}
);

$f3->route('GET /order2', function($f3, $params)  {
    //echo '<h1>Form 2</h1>'; //testing purposes

    $f3->set('animal', $params['animal']);

    $_SESSION['animal'] = $f3->get('animal');
    echo $_SESSION['animal'];

    $view = new View();
    echo $view -> render('views/order2.html');
}
);

$f3->route('POST /results', function() {
    echo '<h1>You ordered a '.$_SESSION['animal'].'</h1>'; //testing purposes

    //$view = new View();
    //echo $view -> render('views/results.html');
}
);

$f3->run();