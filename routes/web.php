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

Route::get('/vinylrecords', fn () => view('vinylrecords'))
    ->name('vinylrecords')
    ->breadcrumbs(fn (Trail $trail) =>
    $trail->push('Музыкальные Пластинки', route('vinylrecords'))
    );


Route::post('/vinylrecords/submit', [\App\Http\Controllers\VinylrecordsController::class, 'submit'])->name('vinylrecords-form');
Route::post('/vinylrecords/all/{id}/update', [\App\Http\Controllers\VinylrecordsController::class, 'updateSubmit'])->name('vinylrecords-update-submit');

Route::get('/vinylrecords/all', [\App\Http\Controllers\VinylrecordsController::class, 'allData'])
    ->name('vinylrecords-data')
    ->breadcrumbs(fn (Trail $trail) => $trail->parent('vinylrecords')->push('Список Пластинок', route('vinylrecords-data'))
);

Route::get('/vinylrecords/all/{id}', [\App\Http\Controllers\VinylrecordsController::class, 'ShowOne'])
    ->name('vinylrecords-one')
    ->breadcrumbs(fn (Trail $trail, $id) => $trail->parent('vinylrecords-data')->push($id , route('vinylrecords-one', $id))
    );

Route::get('/vinylrecords/all/{id}/update', [\App\Http\Controllers\VinylrecordsController::class, 'update'])
    ->name('vinylrecords-update')
    ->breadcrumbs(fn (Trail $trail, $id) => $trail->parent('vinylrecords-one', $id)->push('Редактирование', route('vinylrecords-update', $id))
    );

Route::get('/vinylrecords/all/{id}/delete', [\App\Http\Controllers\VinylrecordsController::class, 'delete'])->name('vinylrecords-delete');

Route::get('/signout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('auth.signout');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
