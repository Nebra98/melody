<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('index');

});
*/

Route::get('/', 'IndexController@index');

Route::get('about', function(){
    return view('about');
});

Route::get('contact', function() {
    return view('contact');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);

});


// Dolje su rute za rad

Route::resource('albums', 'AlbumsController');
Route::resource('photos', 'PhotosController');
Route::get('/albums/{id}', 'AlbumsController@show');

Route::post('/albums/create', 'AlbumsController@store');
Route::get('/photos/create/{id}', 'PhotosController@create');
Route::post('/photos/store/', 'PhotosController@store');

Route::resource('profile', 'ProfilesController');

Route::resource('management', 'ManagementController');

Route::resource('information', 'InformationController');

Route::resource('index', 'IndexController');

Route::resource('contacts', 'ContactsController');
