<?php

use App\Http\Controllers\Admin\Category\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\CouponController;
use App\Http\Controllers\Admin\Category\NewslatersController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
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
    return view('pages.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth', 'authAdmin'])->group(function () {

    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('admin/category', CategoryController::class);

    Route::resource('admin/subcategory', SubCategoryController::class);

    Route::resource('admin/brand', BrandController::class);

    Route::resource('admin/coupon', CouponController::class);

    Route::resource('admin/newslater', NewslatersController::class);

    Route::resource('admin/product', ProductController::class);

    Route::get('admin/product/active/{id}', [ProductController::class, 'active'])->name('product.active');

    Route::get('admin/product/inactive/{id}', [ProductController::class, 'inactive'])->name('product.inactive');
});

require __DIR__.'/auth.php';
