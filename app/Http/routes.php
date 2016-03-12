<?php

Route::get('/', function () {
    return view('welcome');
});

Route::pattern('id', '[0-9]+');

Route::group(['prefix'=>'admin'], function(){

	Route::get('/users',['as'=>'admin.users.index','uses'=>'AdminUsersController@index']);
	Route::get('/users/destroy/{id}',['as'=>'admin.users.destroy','uses'=>'AdminUsersController@destroy']);

	Route::group(['prefix'=>'categories'], function(){

		Route::get('/',['as'=>'admin.categories.index','uses'=>'AdminCategoriesController@index']);
		Route::get('/create',['as'=>'admin.categories.create','uses'=>'AdminCategoriesController@create']);
		Route::post('/store',['as'=>'admin.categories.store','uses'=>'AdminCategoriesController@store']);
		Route::get('/edit/{id}',['as'=>'admin.categories.edit','uses'=>'AdminCategoriesController@edit']);
		Route::put('/update/{id}',['as'=>'admin.categories.update','uses'=>'AdminCategoriesController@update']);
		Route::get('/destroy/{id}',['as'=>'admin.categories.destroy','uses'=>'AdminCategoriesController@destroy']);
	});

	Route::group(['prefix'=>'products'], function(){

		Route::get('/',['as'=>'admin.products.index','uses'=>'AdminProductsController@index']);
		Route::get('/create',['as'=>'admin.products.create','uses'=>'AdminProductsController@create']);
		Route::post('/store',['as'=>'admin.products.store','uses'=>'AdminProductsController@store']);
		Route::get('/edit/{id}',['as'=>'admin.products.edit','uses'=>'AdminProductsController@edit']);
		Route::put('/update/{id}',['as'=>'admin.products.update','uses'=>'AdminProductsController@update']);
		Route::get('/destroy/{id}',['as'=>'admin.products.destroy','uses'=>'AdminProductsController@destroy']);
	});
});