<?php

use App\Http\Controllers\Pages\Home;
use App\Http\Controllers\Pages\about;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\courses;
use App\Http\Controllers\Pages\profile;
use App\Http\Controllers\Pages\teacher;
use App\Http\Controllers\Pages\countactUS;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Pages\beinstractor;

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

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::middleware(['auth','verified'])->group(function () {


    Route::get('/home',[Home::class,'home'] );
    Route::get('/beInstractor',[beinstractor::class,'beInstractor'] );
    Route::get('/countactUS',[countactUS::class,'contactus'] );
    Route::get('/courses',[courses::class,'courses'] );
    Route::get('/about',[about::class,'about'] );
    Route::get('/instractor',[teacher::class,'instractor'] );
    Route::get('/profile',[profile::class,'profile'] );
    Route::get('/viewUpdateProfile',[profile::class,'updateProfile'] );
});



require __DIR__.'/auth.php';
