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
Route::get('/catalog/{type}', [Controllers\CatalogController::class, 'getIndex']);
Route::get('/catalog_one/{catalog}', [Controllers\CatalogController::class, 'getOne']);
Route::post('/catalog/{catalog}/add_picture', [Controllers\CatalogController::class, 'addPicture']);
Route::controller(Controllers\QuestionController::class)->prefix('question')->group(function(){
Route::post('/', 'postIndex');
});
Route::get('/review',[Controllers\ReviewController::class, 'getIndex']);
Route::post('/review',[Controllers\ReviewController::class, 'postIndex']);
Route::get('/trener',[Controllers\TrenerController::class, 'getPage']);
Route::get('/adminka',[Controllers\Admin\ReviewController::class, 'getIndex']);
Route::get('/adminka/review/{id}/edit',[Controllers\Admin\ReviewController::class, 'getEdit']);
Route::post('/adminka/review/{id}',[Controllers\Admin\ReviewController::class, 'postUpdate']);
Route::get('/adminka/review/{id}/delete',[Controllers\Admin\ReviewController::class, 'destroy']);




Route::get('/{url}',[Controllers\MaintextController::class, 'getUrl']); //всегда в конце
