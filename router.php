<?php
use App\Lib\Utils;
use App\Models\User;

// load the router
$router = new \Bramus\Router\Router();

$templates = new \League\Plates\Engine('../app/Views');
$templates->addFolder('layout','../app/Views/layout');

// $router->get('/', function(){
//     echo "<h1>This is HOME</h1>";
//     echo "<a href='/'>HOME</a> ";
//     echo "<a href='/about'>ABOUT</a>";
// });

// $router->get('/about', function(){
//     echo "<h1>This is ABOUT</h1>";
//     echo "<a href='/'>HOME</a> ";
//     echo "<a href='/about'>ABOUT</a>";
// });

$router->get('/hello/{name}', function($name) {
    echo '<h1>Hello ' . htmlentities($name) . '</h1>';
});

// routing rules
$router->get('/', 'App\Controllers\Home@index');
$router->get('/about', 'App\Controllers\Home@about');
$router->get('/login', 'App\Controllers\Auth@login');
$router->post('/login', 'App\Controllers\Auth@do_login');
$router->get('/register', 'App\Controllers\Auth@register');
$router->post('/register', 'App\Controllers\Auth@do_register');
$router->get('/logout', 'App\Controllers\Auth@logout');

$router->get('/users', 'App\Controllers\UserController@index' );
$router->get('/users/{id}', 'App\Controllers\UserController@edit' );
$router->post('/users/{id}', 'App\Controllers\UserController@do_edit' );



$router->get('/member', 'App\Controllers\MemberController@index');

$router->before('GET|POST', '/member.*', function(){
    Utils::check_login();
});

$router->before('GET|POST', '/users.*', function(){
    global $templates;

    Utils::check_login();

    if(Utils::is_role('admin') == false ) {
        echo $templates->render('invalid');
        exit();
    }

});


$router->get('/db-test', function(){

    $user_model = new User();
    $user1 = $user_model->save([
        'name' => 'Zainal',
        'username' => 'zainal',
        'email' => 'zainal@tamingtech.my',
        'password' => ' '
    ]);

    var_dump($user1);

});

$router->get('/db-test2', function(){

    $user_model = new User();
    $all_users = $user_model->get_all();

    var_dump($all_users);

});



$router->set404(function() {
    global $templates;

    header('HTTP/1.1 404 Not Found');
    echo $templates->render('404');
});


// run router
$router->run();