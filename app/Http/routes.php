<?php

Route::pattern('id', '[0-9]+');

Route::controllers([
	'auth'		=>	'Auth\AuthController',
	'password'	=>	'Auth\PasswordController'
]);

Route::get('/', ['as' => 'store.index', 'uses' => 'StoreController@index']);
Route::get('category/{id}',['as'=>'store.category','uses'=>'StoreController@category']);
Route::get('product/{id}',['as'=>'store.product','uses'=>'StoreController@product']);
Route::get('tag/{id}',['as'=>'store.tag','uses'=>'StoreController@tag']);
Route::get('cart',['as'=>'cart','uses'=>'CartController@index']);
Route::get('cart/add/{id}',['as'=>'cart.add','uses'=>'CartController@add']);
Route::get('cart/destroy/{id}',['as'=>'cart.destroy','uses'=>'CartController@destroy']);
Route::put('cart/update/{id}',['as'=>'cart.update','uses'=>'CartController@update']);

Route::get('checkout/placeOrder', ['as'=>'checkout.place','uses'=>'CheckoutController@place']);	

Route::group(['prefix'=>'admin'], function(){

	Route::get('/users',['as'=>'users.index','uses'=>'AdminUsersController@index']);
	Route::get('/users/destroy/{id}',['as'=>'users.destroy','uses'=>'AdminUsersController@destroy']);

	Route::group(['prefix'=>'categories'], function(){

		Route::get('/',['as'=>'categories.index','uses'=>'AdminCategoriesController@index']);
		Route::get('/create',['as'=>'categories.create','uses'=>'AdminCategoriesController@create']);
		Route::post('/store',['as'=>'categories.store','uses'=>'AdminCategoriesController@store']);
		Route::get('/edit/{id}',['as'=>'categories.edit','uses'=>'AdminCategoriesController@edit']);
		Route::put('/update/{id}',['as'=>'categories.update','uses'=>'AdminCategoriesController@update']);
		Route::get('/destroy/{id}',['as'=>'categories.destroy',
			'uses'=>'AdminCategoriesController@destroy']);
		
	});

	Route::group(['prefix'=>'products'], function(){

		Route::get('/',['as'=>'products.index','uses'=>'AdminProductsController@index']);
		Route::get('/create',['as'=>'products.create','uses'=>'AdminProductsController@create']);
		Route::post('/store',['as'=>'products.store','uses'=>'AdminProductsController@store']);
		Route::get('/edit/{id}',['as'=>'products.edit','uses'=>'AdminProductsController@edit']);
		Route::put('/update/{id}',['as'=>'products.update','uses'=>'AdminProductsController@update']);
		Route::get('/destroy/{id}',['as'=>'products.destroy','uses'=>'AdminProductsController@destroy']);

		Route::group(['prefix'=>'images'], function(){

			Route::get('/{id}', ['as'=>'products.images','uses'=>'AdminProductsController@images']);
			Route::get('/create/{id}', ['as'=>'products.images.create',
				'uses'=>'AdminProductsController@createImage']);
			Route::post('/store/{id}', ['as'=>'products.images.store',
				'uses'=>'AdminProductsController@storeImage']);
			Route::get('/destroy/{id}', ['as'=>'products.images.destroy',
				'uses'=>'AdminProductsController@destroyImage']);

		});
	});
});

