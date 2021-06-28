<?php

use App\Http\Controllers\JobController;
use App\Jobs\Job;

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return $router->app->version();
});


$router->group(['prefix' => 'api/v1/'], function () use ($router) {
   
    // Job Leades routes     
    $router->get('job', ['as' => 'job', 'uses' => 'JobController@index']);
    $router->put('job', ['as' => 'job.update', 'uses' => 'JobController@update']);

    $router->get('/get-container-ip', function () use ($router) {
        dd(request()->ip()); 
    });
});
