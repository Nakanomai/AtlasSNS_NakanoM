<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::get('/logout','Auth\LoginController@logout');

//ログイン中のページ
Route::group(['middleware' => 'auth'], function() {
  Route::get('/top','PostsController@index');
  Route::post('post/create','PostsController@create');
  Route::post('/post/update', 'PostsController@update');
  Route::get('post/{id}/delete', 'PostsController@delete');
  //プロフィール関連
  Route::get('/profile','UsersController@profile');
  Route::post('/profile','UsersController@profileUpdate');
  // ユーザ関連

  Route::get('/search','UsersController@search');
  //
  Route::post('users/{id}/follow', 'UsersController@follow')->name('follow');
  Route::delete('users/{id}/unfollow', 'UsersController@unfollow')->name('unfollow');

  Route::get('/follow-list','FollowsController@followList');
  Route::get('/follower-list','FollowsController@followerList');
  // フォロー・フォロー解除を追加
  Route::get('users/{id}/profile', 'UsersController@othersprofile');
});
