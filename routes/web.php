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

// TODO: replace auth routes for only login and password related routes
Auth::routes();

// Admin
Route::get('/admin', 'AdminController@index')->name('admin');

// Admin Users
Route::resource('admin/users','AdminUserController',[
    'except'=> ['show'],
    'names' => [
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]
]);

// Admin Categories
Route::resource('admin/categories','AdminCategoryController',[
    'except'=> ['show'],
    'names' => [
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ]
]);

// Front
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/category/{id}', 'CategoryController@index')->name('category');

// Put this route always at the bottom of the file to ensure that the other routes are evaluated before
Route::get('/{slug}', 'PostController@index')->name('post');
