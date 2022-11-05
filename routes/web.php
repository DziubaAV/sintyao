<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
Route::get("/",[Controllers\BaseController::class,"getIndex"]);


Auth::routes();

Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('/catalog/{type}',[Controllers\CatalogController::class, 'getIndex']);
Route::get('/catalog_one/{catalog}',[Controllers\CatalogController::class, 'getOne']);