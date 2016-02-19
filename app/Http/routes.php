<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

	Route::get('/', function () {
    	return view('welcome');
	});

    Route::auth();

    Route::group([
    	'prefix' => LaravelLocalization::setLocale(),
    	'middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect']
    ], function() {
    	Route::get(LaravelLocalization::transRoute('routes.tasks'), 'TaskController@index');
    	Route::get(LaravelLocalization::transRoute('routes.home'), function () {
    		return view('welcome');
		});
		Route::get(LaravelLocalization::transRoute('routes.login'), 'Auth\AuthController@showLoginForm');
		Route::get(LaravelLocalization::transRoute('routes.register'), 'Auth\AuthController@showRegistrationForm');
    });

    //Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destroy');
});




