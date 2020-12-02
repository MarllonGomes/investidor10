<?php

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

Route::name('web.')->group(function() {
    Route::get('/', [App\Http\Controllers\Web\ArticlesController::class,'index'])->name('home');
    Route::get('/artigo/{slug}',[App\Http\Controllers\Web\ArticlesController::class,'show'])->name('article');
    Route::get('/categoria/{slug}',[App\Http\Controllers\Web\CategoriesController::class,'show'])->name('category');
});

Route::name('admin.')->prefix('admin')->group(function() {
    Route::get('/noticias',[App\Http\Controllers\Admin\ArticlesController::class,'index'])->name('articles');
});