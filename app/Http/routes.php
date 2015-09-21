<?php

Route::get('/', ['as' => '/', 'uses' => 'PagesController@index']);
Route::get('home', ['as' => 'home', 'uses' => 'PagesController@home']);

// Route::get('/map', ['as' => 'map', 'uses' => 'LocationsController@map']);

Route::resource('users', 'UsersController');
Route::get('users/delete/{id}', 'UsersController@destroy');

Route::resource('roles', 'RolesController');
Route::get('roles/delete/{id}', 'RolesController@destroy');

Route::resource('permissions', 'PermissionsController');
Route::get('permissions/delete/{id}', 'PermissionsController@destroy');

Route::resource('departments', 'DepartmentsController');
Route::get('departments/delete/{id}', 'DepartmentsController@destroy');

Route::get('assets/map', ['as' => 'assets.map', 'uses' => 'AssetsController@map']);
Route::get('assets/grid', ['as' => 'assets.grid', 'uses' => 'AssetsController@grid']);
Route::resource('assets', 'AssetsController');
Route::get('assets/delete/{id}', 'AssetsController@destroy');

Route::resource('employees', 'EmployeesController');
Route::get('employees/delete/{id}', 'EmployeesController@destroy');

Route::resource('categories', 'CategoriesController');
Route::get('categories/delete/{id}', 'CategoriesController@destroy');

Route::resource('vendors', 'VendorsController');
Route::get('vendors/delete/{id}', 'VendorsController@destroy');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Route::get('users', ['middleware' => 'acl:manage_users', function()
// {
//     return redirect('/home');
// }]);