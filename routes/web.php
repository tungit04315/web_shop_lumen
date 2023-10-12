<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use App\Models\notification;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {

//     $notification = notification::all();

//     // echo $notification;
//     // return view('h');
//     return view('index', ['notification' => $notification]);
// });

$router->get('/admin', function () use ($router) {
    $notification = notification::all();

    return view('addNotification', ['notification' => $notification]);
});

$router->get('/test', function () use ($router) {
    return view('test');
});

$router->get('/','HomeController@Home');

$router->post('/create','HomeController@Create');
$router->put('/update/{id}','HomeController@Update');
$router->delete('/delete/{id}','HomeController@Delete');
$router->get('/findById','HomeController@FindById');

$router->get('/notification', 'HomeController@index');
