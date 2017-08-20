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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes() implements a middleware from login, logout routes
Auth::routes();

// when logged the user redirects to home page
Route::get('/home', 'HomeController@index')->name('home');

// Implements the contacts routes: index(list), create(view), store(post new contact),
// edit(view edit) and update(update contact) in ContactsController
Route::resource('contacts', 'ContactController');
