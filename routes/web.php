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
    return redirect()->route('welcome');}
);

Auth::routes();
Route::get('/welcome', [App\Http\Controllers\landing::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/send_message', [App\Http\Controllers\HomeController::class, 'send_message'])->name('send_message');
Route::get('/history/{user_details}', [App\Http\Controllers\HomeController::class, 'history'])->name('history');
Route::get('/action/{complain_id}', [App\Http\Controllers\HomeController::class, 'action'])->name('action');
Route::get('/mail/{complain_id}', [App\Http\Controllers\HomeController::class, 'mail'])->name('mail');
