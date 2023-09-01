<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\itemController;
use App\Http\Controllers\categoryController;

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
//itemController
Route::get('/',[itemController::class, 'index'])->name('index')->middleware('auth');
Route::get('/create-item', [itemController::class, 'create'])->name('create_item')->middleware('is_admin');
Route::POST('/create-item', [itemController::class, 'store'])->name('store_item');
Route::get('/edit-catalog', [itemController::class, 'editCatalog'])->name('edit_catalog')->middleware('is_admin');
Route::get('/edit_item/{item:id}', [itemController::class, 'edit'])->name('edit_item')->middleware('is_admin');
Route::PATCH('/update_item/{item:id}', [itemController::class, 'update'])->name('update_item');
Route::DELETE('/delete_item/{id}', [itemController::class, 'delete'])->name('delete_item');

//categoryCtonroller
Route::get('/create-category', [categoryController::class, 'create'])->name('create_category')->middleware('is_admin');
Route::POST('/create-category', [categoryController::class, 'store'])->name('store_category');
Route::get('/categories', [categoryController::class, 'index'])->name('categories')->middleware('auth');
Route::get('/show-category/{category:id}', [categoryController::class, 'show'])->name('show_category');
//cartController
Route::POST('/add-cart/{item:id}', [cartController::class, 'addCart'])->name('add_cart');
Route::get('/show-cart', [cartController::class, 'index'])->name('show_cart')->middleware('auth');
Route::DELETE('/delete-cart', [cartController::class, 'delete'])->name('delete_cart');

//authController
Route::get('/login', [authController::class, 'loginPage'])->name('loginPage')->middleware('guest');
Route::POST('/login', [authController::class, 'authenticate'])->name('login');
Route::get('/register', [authController::class, 'registerPage'])->name('registerPage')->middleware('guest');
Route::POST('/register', [authController::class, 'register'])->name('register');
Route::POST('/logout', [authController::class, 'logout'])->name('logout');