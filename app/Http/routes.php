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

    Route::get('/', ['as'=>'categoriesList', 'uses' => 'CategoriesController@index']);

    Route::get('create', ['as'=>'categoryCreate', 'uses' =>'CategoriesController@create']);

    Route::post('/', ['as'=>'categoryPost', 'uses' =>'CategoriesController@store']);

    Route::group(['prefix'=>'{id}'],function($id){

        Route::get('/', ['as'=>'categoryShow', 'uses' =>'AdminCategoriesController@index']);

        Route::get('edit', ['as'=>'categoryEdit', 'uses' =>'AdminCategoriesController@index']);

        Route::put('/',  ['as'=>'categoryUpdate', 'uses' =>'AdminCategoriesController@index']);

        Route::delete('/',  ['as'=>'categoryDelete', 'uses' =>'AdminCategoriesController@index']);


    });

});


Route::group(['prefix'=>'admin'],function(){

    // Route::group(['prefix'=>'categories'], function(){

    //     Route::get('/', ['as'=>'categoriesList', 'uses' => 'CategoriesController@index']);

    //     Route::get('create', ['as'=>'categoryCreate', 'uses' =>'AdminCategoriesController@index']);

    //     Route::post('/', ['as'=>'categoryPost', 'uses' =>'AdminCategoriesController@index']);

    //     Route::group(['prefix'=>'{id}'],function($id){

    //         Route::get('/', ['as'=>'categoryShow', 'uses' =>'AdminCategoriesController@index']);

    //         Route::get('edit', ['as'=>'categoryEdit', 'uses' =>'AdminCategoriesController@index']);

    //         Route::put('/',  ['as'=>'categoryUpdate', 'uses' =>'AdminCategoriesController@index']);

    //         Route::delete('/',  ['as'=>'categoryDelete', 'uses' =>'AdminCategoriesController@index']);


    //     });

    // });

    Route::group(['prefix'=>'products'], function(){

        Route::get('/', ['as'=>'productsList', 'uses' =>'AdminProductsController@index']);

        Route::get('create', ['as'=>'productCreate', 'uses' =>'AdminProductsController@index']);

        Route::post('/', ['as'=>'productPost', 'uses' =>'AdminProductsController@index']);

        Route::group(['prefix'=>'{id}'],function($id){

            Route::get('/', ['as'=>'productShow', 'uses' =>'AdminProductsController@index']);

            Route::get('edit', ['as'=>'productEdit', 'uses' =>'AdminProductsController@index']);

            Route::put('/', ['as'=>'productUpdate', 'uses' =>'AdminProductsController@index']);

            Route::delete('/', ['as'=>'productDelete', 'uses' =>'AdminProductsController@index']);


        });

    });

});


Route::get('home', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);