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

//ユーザー登録
Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');

Route::get('/', 'WelcomeController@index');

Route::group(['middleware' => 'auth'],function(){
   Route::resource('posts', 'PostsController');
   Route::resource('user', 'UserController', ['only' => ['show']]);

   Route::group(['prefix' => 'user/{id}'], function () {
      Route::post('favorite', 'UserFavoriteController@store')->name('favorite.post');
      Route::post('unfavorite', 'UserFavoriteController@destroy')->name('unfavorite.post');
      Route::get('favoritings', 'UserFavoriteController@favoritings')->name('favoritings.get');
   });
});