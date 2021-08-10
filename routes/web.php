<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\FbController;
use App\Http\Controllers\Auth\GoogleController;



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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


////SOCIAL LOGIN facebook

Route::get('auth/facebook', [FbController::class, 'redirectToFacebook'])->name('login.facebook');

Route::get('auth/facebook/callback', [FbController::class, 'facebookSignin']);

//// SOCIAL LOGIN google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');

Route::get('auth/google/callback', [GoogleController::class, 'googleSignin']);


