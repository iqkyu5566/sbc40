<?php

use App\Http\Controllers\Bc40Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/auth/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auth-logout');

    Route::get('/dashboard', [Bc40Controller::class, 'dashboard'])->name('dashboard');
    Route::get('/bc40-import', [Bc40Controller::class, 'index'])->name('bc40-index');
    Route::get('/download_template', [Bc40Controller::class, 'download_template'])->name('download_template');
    Route::get('/browse', [Bc40Controller::class, 'browse'])->name('bc40-browse');

    Route::post('/bc40-import', [\App\Http\Controllers\Bc40Controller::class, 'import'])->name('bc40-import');
});

Route::post('auth/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth-login');
