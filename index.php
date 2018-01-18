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
    //echo '<h1>This is default</h1>'; //testing purposes


   $view = new View();
   echo $view -> render('views/home.hmtl');
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
            echo $view->render('views/home.hmtl');

    }
}
);

$f3->route('GET /pets/order', function() {
    echo '<h1>Form 1</h1>'; //testing purposes

//    $view = new View();
//    echo $view -> render('views/form1.hmtl');
}
);

$f3->route('GET /pets/order2', function() {
    echo '<h1>Form 2</h1>'; //testing purposes

//    $view = new View();
//    echo $view -> render('views/form2.hmtl');
}
);

$f3->route('GET /pets/results', function() {
    echo '<h1>Results</h1>'; //testing purposes

//    $view = new View();
//    echo $view -> render('views/results.hmtl');
}
);

$f3->run();