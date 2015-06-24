<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::pattern('id','[0-9]+');


Route::group(['prefix'=>'categories'], function(){

    Route::get('/', ['as'=>'categories', 'uses' => 'CategoriesController@index']);

    Route::get('create', ['as'=>'categories.create', 'uses' =>'CategoriesController@create']);

    Route::post('/', ['as'=>'categories.store', 'uses' =>'CategoriesController@store']);

    Route::group(['prefix'=>'{id}'],function($id){

        Route::get('edit', ['as'=>'categories.edit', 'uses' =>'CategoriesController@edit']);

        Route::put('/update',  ['as'=>'categories.update', 'uses' =>'CategoriesController@update']);

        Route::get('/destroy',  ['as'=>'categories.destroy', 'uses' =>'CategoriesController@destroy']);


    });

});

Route::group(['prefix'=>'products'], function(){

    Route::get('/', ['as'=>'products', 'uses' => 'ProductsController@index']);

    Route::get('create', ['as'=>'products.create', 'uses' =>'ProductsController@create']);

    Route::post('/', ['as'=>'products.store', 'uses' =>'ProductsController@store']);

    Route::group(['prefix'=>'{id}'],function($id){

        Route::get('edit', ['as'=>'products.edit', 'uses' =>'ProductsController@edit']);

        Route::put('/update',  ['as'=>'products.update', 'uses' =>'ProductsController@update']);

        Route::get('/destroy',  ['as'=>'products.destroy', 'uses' =>'ProductsController@destroy']);


    });

});


Route::get('home', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);