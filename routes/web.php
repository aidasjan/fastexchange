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

Route::get('modules', 'Modules\ModuleController@create');
Route::get('modules-list', 'Modules\ModuleController@createList');
Route::get('modules/{id}/edit', 'Modules\ModuleController@edit');
Route::post('modules', 'Modules\ModuleController@store');
Route::put('modules/{id}', 'Modules\ModuleController@update');
Route::put('modules-list/{id}', 'Modules\ModuleController@updateList');
Route::delete('modules/{id}', 'Modules\ModuleController@destroy');

Route::get('faculties', 'Faculties\FacultyController@create');
Route::get('faculties/{id}/edit', 'Faculties\FacultyController@edit');
Route::post('faculties', 'Faculties\FacultyController@store');
Route::put('faculties/{id}', 'Faculties\FacultyController@update');
Route::delete('faculties/{id}', 'Faculties\FacultyController@destroy');

Route::get('tags', 'Tags\TagController@create');
Route::get('tags/{id}/edit', 'Tags\TagController@edit');
Route::post('tags', 'Tags\TagController@store');
Route::put('tags/{id}', 'Tags\TagController@update');
Route::delete('tags/{id}', 'Tags\TagController@destroy');

// English test routes
Route::get('questions/create', 'EnglishTest\TestQuestionController@create');
Route::get('questions/{id}/edit', 'EnglishTest\TestQuestionController@edit');
Route::post('questions', 'EnglishTest\TestQuestionController@store');
Route::put('questions/{id}', 'EnglishTest\TestQuestionController@update');
Route::delete('questions/{id}', 'EnglishTest\TestQuestionController@destroy');

Route::get('test/take', 'EnglishTest\TestTakingController@show');
Route::post('test/take', 'EnglishTest\TestTakingController@submit');

Route::get('exams', 'EnglishTest\ExamController@create');
Route::post('exams', 'EnglishTest\ExamController@store');

Route::get('exams/{id}/register', 'EnglishTest\ExamController@register');
