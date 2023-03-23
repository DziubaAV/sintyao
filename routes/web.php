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

Route::get('/price',[Controllers\PriceController::class, 'getPrice']);

Route::prefix('adminka')->group(function(){
    Route::get('/',[Controllers\Admin\ReviewController::class, 'getIndex']);
    Route::get('/review/{id}/edit',[Controllers\Admin\ReviewController::class, 'getEdit']);
    Route::post('/review/{id}',[Controllers\Admin\ReviewController::class, 'postUpdate']);
    Route::get('/review/{id}/delete',[Controllers\Admin\ReviewController::class, 'destroy']);

    Route::get('/catalog/{id}',[Controllers\Admin\CatalogController::class, 'getCatalog']);
    Route::post('/catalog/',[Controllers\Admin\CatalogController::class, 'postIndex']);
    Route::post('/catalog/{catalog}/add_picture',[Controllers\Admin\CatalogController::class, 'addPicture']);
    Route::get('/delete_picture/{id}',[Controllers\Admin\CatalogController::class, 'destroyPicture']);

    Route::post('/catalog/{catalog}/add_video',[Controllers\Admin\CatalogController::class, 'addVideo']);
});

Route::get('/{url}',[Controllers\MaintextController::class, 'getUrl']); //всегда в конце
