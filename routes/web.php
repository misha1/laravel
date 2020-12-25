<?php
use Tabuna\Breadcrumbs\Trail;
use Illuminate\Support\Facades\Route;

Route::get('/home', fn () => view('home'))
    ->name('home')
    ->breadcrumbs(fn (Trail $trail) =>
    $trail->push('main', route('home'))
    );

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/plastinky', fn () => view('plastinky'))
    ->name('plastinky')
    ->breadcrumbs(fn (Trail $trail) =>
    $trail->push('Музыкальные Пластинки', route('plastinky'))
    );


Route::post('/contact/submit', [\App\Http\Controllers\ContactController::class, 'submit'])->name('contact-form');
Route::post('/plastinky/submit', [\App\Http\Controllers\PlastinkyController::class, 'submit'])->name('plastinky-form');
Route::post('/plastinky/all/{id}/update', [\App\Http\Controllers\PlastinkyController::class, 'updateSubmit'])->name('plastinky-update-submit');

Route::get('/plastinky/all', [\App\Http\Controllers\PlastinkyController::class, 'allData'])
    ->name('plastinky-data')
    ->breadcrumbs(fn (Trail $trail) => $trail->parent('plastinky')->push('Список Пластинок', route('plastinky-data'))
);

Route::get('/plastinky/all/{id}', [\App\Http\Controllers\PlastinkyController::class, 'ShowOne'])
    ->name('plastinky-one')
    ->breadcrumbs(fn (Trail $trail, $id) => $trail->parent('plastinky-data')->push($id , route('plastinky-one', $id))
    );

Route::get('/plastinky/all/{id}/update', [\App\Http\Controllers\PlastinkyController::class, 'update'])
    ->name('plastinky-update')
    ->breadcrumbs(fn (Trail $trail, $id) => $trail->parent('plastinky-one', $id)->push('Редактирование', route('plastinky-update', $id))
    );

Route::get('/plastinky/all/{id}/delete', [\App\Http\Controllers\PlastinkyController::class, 'delete'])->name('plastinky-delete');

Route::get('/signout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('auth.signout');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
