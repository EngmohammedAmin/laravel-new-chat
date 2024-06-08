<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/chat', [App\Http\Controllers\ChatsController::class, 'index'])->name('chat');
Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages'])->name('fetchMessages');
Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessage'])->name('sendMessage');

Route::get('/deleteuser', function () {
    $d = Auth::user()->first();
    $delete = $d->delete();

    return redirect()->route('login');
})->name('deletuser');
