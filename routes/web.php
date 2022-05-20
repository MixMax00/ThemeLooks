<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\GenderController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\FrontendController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/register', [BackendController::class, 'store'])->name('register');

Route::middleware('auth')->group(function(){
    Route::get('/users', [BackendController::class, 'index'])->name('viewuser');
    Route::get('/status/{id}', [BackendController::class, 'status'])->name('status');
    Route::get('/delete/{id}', [BackendController::class, 'delete'])->name('delete');
    Route::get('/edit/{id}', [BackendController::class, 'edit'])->name('edit');
    Route::post('/update', [BackendController::class, 'update'])->name('update');

    //Coloe Route
    Route::get('/color', [ColorController::class, 'index'])->name('color');
    Route::post('/color', [ColorController::class, 'store'])->name('color');

    //Gender Route
    Route::get('/gender', [GenderController::class, 'index'])->name('gender');
    Route::post('/gender', [GenderController::class, 'store'])->name('gender');

    //size Route
    Route::get('/size', [SizeController::class, 'index'])->name('size');
    Route::post('/size', [SizeController::class, 'store'])->name('size');

    //product Route
    Route::get('/add/product', [ProductController::class, 'index'])->name('add.product');
    Route::post('/add/product', [ProductController::class, 'store'])->name('store.product');
    Route::get('/manage/product', [ProductController::class, 'viewProduct'])->name('manage.product');
    Route::get('/view//{id}',[ProductController::class, 'show'])->name('view.product');
    Route::get('/edit/product/{id}',[ProductController::class, 'edit'])->name('edit.product');
    Route::post('/update/product',[ProductController::class, 'update'])->name('update.product');
    Route::get('/delete/product/{id}',[ProductController::class, 'deleteProduct'])->name('delete.product');


});



// Front-End View Route


Route::get('/', [FrontendController::class, 'index'])->name('master');
Route::get('/user/register', [FrontendController::class, 'register'])->name('user.register');
Route::get('/user/login', [FrontendController::class, 'login'])->name('user.login');
Route::post('/user/login', [FrontendController::class, 'check'])->name('user.login');
Route::get('/user/profile', [FrontendController::class, 'profile'])->name('user.profile');
Route::post('/user/logout', [FrontendController::class, 'logout'])->name('user.logout');


