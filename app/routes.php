<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/login', array('as' => 'login', 'uses' => 'LoginController@showLogin'));
Route::post('/login', array('uses' => 'LoginController@login'));

Route::group(array('before' => 'auth'), function()
{

    Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

    Route::get('/logout', array('as' => 'logout', 'uses' => 'LoginController@logout'));

    Route::get('/tpl/{tmpl}', 'HomeController@templateHandler');

    Route::get('/b/menu', 'MenuController@all');
    Route::post('/b/menu', 'MenuController@create');
    Route::put('/b/menu/{id}', 'MenuController@update');
    Route::delete('/b/menu{id}', 'MenuController@delete');

    Route::get('/api/article', 'ArticleController@all');
    Route::get('/api/article/{id}', 'ArticleController@find');
    Route::post('/api/article', 'ArticleController@create');
    Route::put('/api/article/{id}', 'ArticleController@update');
    Route::delete('/api/article/{id}', 'ArticleController@delete');

});
