<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('admindashboard');
    });
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/admin/all-category', 'index')->name('allcategory');
    Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
    Route::post('/admin/store-category', 'StoreCategory')->name('storecategory');
    Route::get('/admin/edit-category/{id}', 'EditCategory')->name('editcategory');
    Route::post('/admin/update-category', 'UpdateCategory')->name('updatecategory');
    Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');
});

Route::controller(SubCategoryController::class)->group(function () {
    Route::get('/admin/all-subcategory', 'index')->name('allsubcategory');
    Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
    Route::post('/admin/store-subcategory', 'StoreSubcategory')->name('storesubcategory');
    Route::get('/admin/edit-subcategory/{id}', 'EditSubCategory')->name('editsubcategory');
    Route::post('/admin/update-subcategory', 'UpdateSubCategory')->name('updatesubcategory');
    Route::get('/admin/delete-subcategory/{id}', 'DeleteSubCategory')->name('deletesubcategory');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/admin/all-product', 'index')->name('allproduct');
    Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/admin/pending-order', 'index')->name('pendingorder');
    //Route::get('/admin/add-product','AddProduct')->name('addproduct');
});
require __DIR__ . '/auth.php';
