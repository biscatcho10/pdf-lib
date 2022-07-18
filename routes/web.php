<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OnlineEventController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
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

// country and city routes
Route::get('/world', [WorldController::class, 'all_countries']);
Route::get('/country/{country}', [WorldController::class, 'get_state']);
Route::get('/state/{state}', [WorldController::class, 'get_city']);

// display pdf
Route::get('/pdf/show', [PDFController::class, 'index'])->name('pdf.index');
Route::get('/pdf/add', [PDFController::class, 'create']);
Route::post('/pdf/store', [PDFController::class, 'store'])->name('pdf.store');


//  online event routes
Route::resource('online-events', OnlineEventController::class);


// users routes
Route::resource('users', UserController::class);

// company routes
Route::resource('companies', CompanyController::class);

// address routes
Route::resource('addresses', AddressController::class);
