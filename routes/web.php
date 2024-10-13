<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return "Hello Murtaki";
});

Route::redirect('/contact', '/about');

Route::fallback(function () {
    return view('errors.error-route');
});

Route::get('/hello', [HelloController::class, 'hello'])->name('hello');
Route::post('/upload', [FileController::class, 'upload'])->name('upload');


Route::get('/response', [ResponseController::class, 'response'])->name('response');
Route::prefix('/response')->group(function () {
    Route::get('/header', [ResponseController::class, 'header'])->name('header');
    Route::get('/view', [ResponseController::class, 'responseView'])->name('responseView');
    Route::get('/json', [ResponseController::class, 'responseJson'])->name('responseJson');
    Route::get('/file', [ResponseController::class, 'responseFile'])->name('responseFile');
    Route::get('/download', [ResponseController::class, 'responseDownload'])->name('responseDownload');
});


Route::get('/cookie/set', [CookieController::class, 'setCookie'])->name('setCookie');
Route::get('/cookie/get', [CookieController::class, 'getCookie'])->name('getCookie');
Route::get('/cookie/clear', [CookieController::class, 'clearCookie'])->name('clearCookie');

Route::get('/form/csrf', function () {
    return view('form');
});
Route::post('/submit/crsrf', [FormController::class, 'submit'])->name('csrf');

Route::get('/session', [SessionController::class, 'session'])->name('session');
Route::get('/session/get', [SessionController::class, 'getSession'])->name('getSession');


Route::get('/error/show', function () {
    throw new Exception("Error Processing Request", 1); 
});
