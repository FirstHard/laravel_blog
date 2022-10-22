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

use App\Http\Controllers\Admin\Tag\IndexController as AdminTagIndexController;
use App\Http\Controllers\Admin\Tag\CreateController as AdminTagCreateController;
use App\Http\Controllers\Admin\Tag\StoreController as AdminTagStoreController;
use App\Http\Controllers\Admin\Tag\ShowController as AdminTagShowController;
use App\Http\Controllers\Admin\Tag\EditController as AdminTagEditController;
use App\Http\Controllers\Admin\Tag\UpdateController as AdminTagUpdateController;
use App\Http\Controllers\Admin\Tag\DestroyController as AdminTagDestroyController;

use App\Http\Controllers\Admin\Post\IndexController as AdminPostIndexController;
use App\Http\Controllers\Admin\Post\CreateController as AdminPostCreateController;
use App\Http\Controllers\Admin\Post\StoreController as AdminPostStoreController;
use App\Http\Controllers\Admin\Post\ShowController as AdminPostShowController;
use App\Http\Controllers\Admin\Post\EditController as AdminPostEditController;
use App\Http\Controllers\Admin\Post\UpdateController as AdminPostUpdateController;
use App\Http\Controllers\Admin\Post\DestroyController as AdminPostDestroyController;

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

    Route::prefix('tags')->name('tag.')->group(function () {
        Route::get('/', AdminTagIndexController::class)->name('index');
        Route::get('/create', AdminTagCreateController::class)->name('create');
        Route::post('/', AdminTagStoreController::class)->name('store');
        Route::get('/{tag}', AdminTagShowController::class)->name('show');
        Route::get('/{tag}/edit', AdminTagEditController::class)->name('edit');
        Route::patch('/{tag}', AdminTagUpdateController::class)->name('update');
        Route::delete('/{tag}', AdminTagDestroyController::class)->name('delete');
    });

    Route::prefix('posts')->name('post.')->group(function () {
        Route::get('/', AdminPostIndexController::class)->name('index');
        Route::get('/create', AdminPostCreateController::class)->name('create');
        Route::post('/', AdminPostStoreController::class)->name('store');
        Route::get('/{post}', AdminPostShowController::class)->name('show');
        Route::get('/{post}/edit', AdminPostEditController::class)->name('edit');
        Route::patch('/{post}', AdminPostUpdateController::class)->name('update');
        Route::delete('/{post}', AdminPostDestroyController::class)->name('delete');
    });
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
