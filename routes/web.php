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

$router->get('/', function () use ($router) {

    // $notification = notification::all();

    // echo $notification;
    return view('index');
    // return view('index', ['notification' => $notification]);
});

$router->get('/admin', function () use ($router) {
    return view('addNotification');
});

// $router->get('/','HomeController@Home');

$router->post('/create','HomeController@Create');
