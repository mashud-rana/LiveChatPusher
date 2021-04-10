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

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/get-user','ChatController@getUser');
    Route::get('/get-message/{id}','ChatController@getMessage');
    Route::post('/send-new-message','ChatController@sendNewMessage');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
