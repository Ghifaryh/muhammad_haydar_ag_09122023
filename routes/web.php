<?php

use App\Http\Controllers\TugasController;
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
    return view('pages.main');
});

Route::prefix('tugas')->name('tugas.')->group(function () {
    Route::get('/pertama', [TugasController::class, 'pertama'])->name('pertama');
    Route::get('/kedua', [TugasController::class, 'kedua'])->name('kedua');
    Route::prefix('kedua')->name('kedua.')->group(function () {
        Route::get('/post', [TugasController::class, 'kedua'])->name('index');
    });
});
