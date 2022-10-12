<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\Category\IndexController as AdminCategoryIndexController;
use App\Http\Controllers\Admin\Category\CreateController as AdminCategoryCreateController;
use App\Http\Controllers\Admin\Category\StoreController as AdminCategoryStoreController;
use App\Http\Controllers\Admin\Category\ShowController as AdminCategoryShowController;
use App\Http\Controllers\Admin\Category\EditController as AdminCategoryEditController;
use App\Http\Controllers\Admin\Category\UpdateController as AdminCategoryUpdateController;
use App\Http\Controllers\Admin\Category\DestroyController as AdminCategoryDestroyController;

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

Route::group([], function () {
    Route::get('/', IndexController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', AdminIndexController::class)->name('index');
    Route::prefix('categories')->name('category.')->group(function () {
        Route::get('/', AdminCategoryIndexController::class)->name('index');
        Route::get('/create', AdminCategoryCreateController::class)->name('create');
        Route::post('/', AdminCategoryStoreController::class)->name('store');
        Route::get('/{category}', AdminCategoryShowController::class)->name('show');
        Route::get('/{category}/edit', AdminCategoryEditController::class)->name('edit');
        Route::patch('/{category}', AdminCategoryUpdateController::class)->name('update');
        Route::delete('/{category}', AdminCategoryDestroyController::class)->name('delete');
    });
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
