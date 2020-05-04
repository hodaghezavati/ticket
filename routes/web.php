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
    // $t=DB::table('t')->get();
    // dd($t);
    return view('welcome');
});
Route::get('/ticket/index', function () {
  
    return view('/index');
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Route::get('ticket/{id}', 'ticketController@show');

// Route::get('ticket', '\Modules\ticket\Http\Controllers\ticketController@view');
// Route::get('ticket/store', '\App\Http\Controllers\ticketController@store');
Route::get('ticket/create', '\Modules\ticket\Http\Controllers\ticketController@create');
Route::get('user/edit', '\Modules\user\Http\Controllers\UserController@edit');
Route::post('user/save', '\Modules\user\Http\Controllers\UserController@save');
Route::post('/ticket/store', '\Modules\ticket\Http\Controllers\TicketController@store');
Route::get('/ticket/track', '\Modules\ticket\Http\Controllers\TicketController@track');

Route::get('/ticket/answer', '\Modules\ticket\Http\Controllers\TicketController@answer');
Route::post('/ticket/answersave', '\Modules\ticket\Http\Controllers\TicketController@answersave');
