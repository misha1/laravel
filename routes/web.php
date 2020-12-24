<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('plastinky');
})->name('home');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/plastinky', function () {
    return view('plastinky');
})->name('plastinky');


Route::post('/contact/submit', [\App\Http\Controllers\ContactController::class, 'submit'])->name('contact-form');
Route::post('/plastinky/submit', [\App\Http\Controllers\PlastinkyController::class, 'submit'])->name('plastinky-form');
Route::get('/plastinky/all', [\App\Http\Controllers\PlastinkyController::class, 'allData'])->name('plastinky-data');
Route::get('/plastinky/all/{id}', [\App\Http\Controllers\PlastinkyController::class, 'ShowOne'])->name('plastinky-one');
Route::get('/plastinky/all/{id}/update', [\App\Http\Controllers\PlastinkyController::class, 'update'])->name('plastinky-update');
Route::get('/plastinky/all/{id}/delete', [\App\Http\Controllers\PlastinkyController::class, 'delete'])->name('plastinky-delete');
Route::post('/plastinky/all/{id}/update', [\App\Http\Controllers\PlastinkyController::class, 'updateSubmit'])->name('plastinky-update-submit');

Route::get('/signout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('auth.signout');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
