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

Route::get('/', function () {
    return view('welcome');
});


route::view('adminTables','admin.tables')->name('adminTabales');
route::view('admin','admin.test')->name('test');
route::view('createformation','admin.formation.create')->name('create.formation');
route::get('editformation/{id}','FormationController@edit')->name('edit.formation');
route::post('editformation/{id}','FormationController@update')->name('update.formation');
route::get('deleteformation/{id}','FormationController@destroy')->name('delete.formation');
Route::get('login', '\App\Http\Controllers\Auth\LoginController@login');
route::get('/index','FormationController@index')->name('index');

route::get('/show/{id}','FormationController@show')->name('show');

route::get('profile', 'UserController@profile')->name('profile');
Route::post('profile', 'UserController@update_avatar')->name('profilePost');
Route::get('profile', 'UserController@edit')->name('profilePost');
Route::post('profile', 'UserController@update')->name('profilePost');
route::post('insertformatin','FormationController@store')->name('store.formation');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact', [
    'uses' => 'ContactMessageController@create'
    ]);
Route::post('/contact', [
    'uses' => 'ContactMessageController@store',
    'as' => 'contact.store'
    ]);

// route::get('/contact/{id}','ContactController@show')->name('contact');