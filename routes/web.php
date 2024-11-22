<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/my_message', [HomeController::class, 'my_message'])->name('my_message');
Route::get('/bolim_message', [HomeController::class, 'bolim_message'])->name('bolim_message');
Route::get('/all_message', [HomeController::class, 'all_message'])->name('all_message');

Route::get('/profel', [HomeController::class, 'profel'])->name('profel');
Route::post('/updatePassword', [HomeController::class, 'updatePassword'])->name('updatePassword');


Route::get('/chiqim', [HomeController::class, 'chiqim'])->name('chiqim');
Route::post('/chiqim_create', [HomeController::class, 'chiqim_create'])->name('chiqim_create');
Route::get('/chiqim_show/{id}', [HomeController::class, 'chiqim_show'])->name('chiqim_show');

Route::get('/hodimlar', [HomeController::class, 'hodimlar'])->name('hodimlar');
Route::post('/hodim_create', [HomeController::class, 'hodim_create'])->name('hodim_create');
Route::delete('/hodim_del/{id}', [HomeController::class, 'hodim_del'])->name('hodim_del');

Route::get('/settings', [HomeController::class, 'settings'])->name('settings');
Route::post('/settings_create', [HomeController::class, 'settings_create'])->name('settings_create');
Route::delete('/settings_del/{id}', [HomeController::class, 'settings_del'])->name('settings_del');