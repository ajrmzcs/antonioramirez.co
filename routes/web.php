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

// Use own auth routes to avoid register new users - forgot password is also disabled
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Admin
Route::get('admin', 'AdminController@index')->name('admin');

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

// Admin Posts
Route::resource('admin/posts','AdminPostController',[
    'except'=> ['show'],
    'names' => [
        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'edit' => 'admin.posts.edit',
        'update' => 'admin.posts.update',
        'destroy' => 'admin.posts.destroy',
    ]
]);

// Front
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('send', 'ContactController@send')->name('send');
Route::get('/category/{id}', 'CategoryController@index')->name('category');

// Put this route always at the bottom of the file to ensure that the other routes are evaluated before
Route::get('/{slug}', 'PostController@index')->name('post');
