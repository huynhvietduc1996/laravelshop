<?php

use App\Http\Controllers\Admin\AdminAttributeController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminKeywordController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ProductDetailController;
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
    return view('frontend.index');
});


// ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    // CATEGORY
    Route::prefix('/category')->group(function () {
        Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.category.index');

        Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/create', [AdminCategoryController::class, 'store']);

        Route::get('/update/{id}', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/update/{id}', [AdminCategoryController::class, 'update']);

        Route::get('/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin.category.delete');

        Route::get('/active/{id}', [AdminCategoryController::class, 'active'])->name('admin.category.active');
        Route::get('/hot/{id}', [AdminCategoryController::class, 'hot'])->name('admin.category.hot');
    }
    );

    // KEYWORD
    Route::prefix('/keyword')->group(function () {
        Route::get('/', [AdminKeywordController::class, 'index'])->name('admin.keyword.index');

        Route::get('/create', [AdminKeywordController::class, 'create'])->name('admin.keyword.create');
        Route::post('/create', [AdminKeywordController::class, 'store']);

        Route::get('/update/{id}', [AdminKeywordController::class, 'edit'])->name('admin.keyword.edit');
        Route::post('/update/{id}', [AdminKeywordController::class, 'update']);

        Route::get('/delete/{id}', [AdminKeywordController::class, 'delete'])->name('admin.keyword.delete');
    }
    );

    // ATTRIBUTE
    Route::prefix('/attribute')->group(function () {
        Route::get('/', [AdminAttributeController::class, 'index'])->name('admin.attribute.index');

        Route::get('/create', [AdminAttributeController::class, 'create'])->name('admin.attribute.create');
        Route::post('/create', [AdminAttributeController::class, 'store']);

        Route::get('/update/{id}', [AdminAttributeController::class, 'edit'])->name('admin.attribute.edit');
        Route::post('/update/{id}', [AdminAttributeController::class, 'update']);

        Route::get('/delete/{id}', [AdminAttributeController::class, 'delete'])->name('admin.attribute.delete');
    }
    );
    // PRODUCT
    Route::prefix('product')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('admin.product.index');

        Route::get('/create', [AdminProductController::class, 'create'])->name('admin.product.create');
        Route::post('/create', [AdminProductController::class, 'store']);

        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/edit/{id}', [AdminProductController::class, 'update']);

        Route::get('/delete/{id}', [AdminProductController::class, 'delete'])->name('admin.product.delete');

        Route::get('/hot/{id}', [AdminProductController::class, 'hot'])->name('admin.product.hot');
        Route::get('/active/{id}', [AdminProductController::class, 'active'])->name('admin.product.active');
    }
    );
});

// FRONT-END
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('get.index');
    Route::get('/san-pham', [ProductController::class, 'index'])->name('get.product.list');
    Route::get('/san-pham/{slug}', [ProductDetailController::class, 'getProductDetail'])->name('get.product.detail');
});
