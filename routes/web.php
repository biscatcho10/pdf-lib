<?php

use App\Http\Controllers\PDFController;
use App\Http\Controllers\WorldController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/world', [WorldController::class, 'all_countries']);
Route::get('/country/{country}', [WorldController::class, 'get_state']);
Route::get('/state/{state}', [WorldController::class, 'get_city']);

// display pdf
Route::get('/pdf/show', [PDFController::class, 'index'])->name('pdf.index');
Route::get('/pdf/add', [PDFController::class, 'create']);
Route::post('/pdf/store', [PDFController::class, 'store'])->name('pdf.store');


