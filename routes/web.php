<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


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
    return view('welcome');
});

Auth::routes();

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [AdminController::class, 'index'])
    ->name('admin.home')
    ->middleware('is_admin');

//PENGELOLAAN BUKU
Route::get('admin/books', [BookController::class, 'index'])
    ->name('admin.books');
// ->middleware('is_admin');

Route::post('admin/books', [BookController::class, 'store'])
    ->name('admin.books.submit');
// ->middleware('is_admin');

Route::post('admin/books', [BookController::class, 'submit_Book'])
    ->name('admin.books.submit');
// ->middleware('is_admin');

//UPDATE BOOK
Route::patch('admin/books/update', [BookController::class, 'update'])
    ->name('admin.books.update');
// ->middleware('is_admin');

Route::get('admin/ajaxadmin/dataBook/{id}', [BookController::class, 'getDataBook']);

Route::delete('admin/books/delete', [BookController::class, 'destroy'])
    ->name('admin.books.delete');
// ->middleware('is_admin');

//BRANDS
Route::get('admin/merek', [App\Http\Controllers\BrandsController::class, 'index'])
    ->name('admin.merek')
    ->middleware('is_admin');

//route tambah 
Route::post('admin/merek', [BrandsController::class, 'tambah_brand'])
    ->name('admin.brand.submit')
    ->middleware('is_admin');

//route edit
Route::patch('admin/merek/update', [BrandsController::class, 'update_brands'])
    ->name('admin.brand.update')
    ->middleware('is_admin');
Route::get('admin/ajaxadmin/dataBrands/{id}', [BrandsController::class, 'getDataBrands']);

//route delete
Route::delete('admin/merek/delete', [BrandsController::class, 'delete_brands'])
    ->name('admin.brand.delete')
    ->middleware('is_admin');

// KATEGORI
Route::get('admin/kategori', [CategoriesController::class, 'index'])
    ->name('admin.kategori')
    ->middleware('is_admin');
Route::post('admin/kategori', [CategoriesController::class, 'tambah_categories'])
    ->name('admin.kategori.submit')
    ->middleware('is_admin');

//route edit categories
Route::patch('admin/kategori/update', [CategoriesController::class, 'update_categories'])
    ->name('admin.kategori.update')
    ->middleware('is_admin');
Route::get('admin/ajaxadmin/dataCategories/{id}', [CategoriesController::class, 'getDataCategories']);

//route delete categories
Route::delete('admin/kategori/delete', [CategoriesController::class, 'delete_categories'])
    ->name('admin.kategori.delete')
    ->middleware('is_admin');

//PENGELOLAAN USER
Route::get('admin/users', [UserController::class, 'index'])
    ->name('admin.users');
// ->middleware('is_admin');

Route::post('admin/users', [UserController::class, 'store'])
    ->name('admin.pengguna.submit');
// ->middleware('is_admin');

Route::post('admin/users', [UserController::class, 'submit_user'])
    ->name('admin.pengguna.submit');
// ->middleware('is_admin');

//UPDATE USER
Route::patch('admin/users/update', [UserController::class, 'update'])
    ->name('admin.pengguna.update');
// ->middleware('is_admin');

Route::get('admin/ajaxadmin/dataUser/{id}', [UserController::class, 'getDataUser']);

// DELETE USER
Route::delete('admin/users/delete', [UserController::class, 'destroy'])
    ->name('admin.pengguna.delete');
// ->middleware('is_admin');