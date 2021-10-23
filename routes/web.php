<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;

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

// category Controller

Route::get('/category/all',[CategoryController::class,'AllCat'])->name('all.category');

Route::post('/category/add',[CategoryController::class,'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class,'Edit'])->name('category.edit');



Route::post('/category/{id}', [CategoryController::class,'Update'])->name('category.update');

Route::get('/category/{id}', [CategoryController::class,'SoftDeleted'])->name('category.SoftDeleted');



Route::get('/category/restore/{id}', [CategoryController::class,'Restore'])->name('category.restore');

Route::get('/category/forceddelete/{id}', [CategoryController::class,'ForcedDelete'])->name('category.forcedDelete');

// Route for brand

Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('all.brand');

Route::post('/brand/add',[BrandController::class,'StoreBrand'])->name('store.brand');

Route::get('/brand/edit/{id}', [BrandController::class,'Edit'])->name('brand.edit');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    return view('dashboard',compact('users'));
})->name('dashboard');
