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

Route::get('/', 'MainController@index');

// Users routes
Route::get('users', 'UsersController@index')->name('users.index');
Route::get('users/create', 'Users\UsersController@create');
Route::get('users/{id}/edit', 'Users\UsersController@edit');
Route::post('users', 'Users\UsersController@store');
Route::put('users/{id}', 'Users\UsersController@update');
Route::delete('users/{id}', 'Users\UsersController@destroy');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');
Route::get('dashboard', 'Users\DashboardController@index');

Route::get('users/roles', 'Users\RoleController@create');
Route::get('users/roles/{id}/edit', 'Users\RoleController@edit');
Route::post('users/roles', 'Users\RoleController@store');
Route::put('users/roles/{id}', 'Users\RoleController@update');
Route::delete('users/roles/{id}', 'Users\RoleController@destroy');
