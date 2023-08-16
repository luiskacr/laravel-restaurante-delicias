<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\ProductsController;
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


Route::group([
    'middleware'=>'guest',
    ],
    function(){
        Route::get('/', [\App\Http\Controllers\website\HomeController::class, 'index'])->name('index');
        Route::get('/contacto', [\App\Http\Controllers\website\ContactController::class, 'index'])->name('website.contact');
        Route::post('/contacto', [\App\Http\Controllers\website\ContactController::class, 'store'])->name('website.contact.store');
        Route::get('/menu', [\App\Http\Controllers\website\ProductsController::class, 'index'])->name('website.products');

        //Login
        Route::get('/login',[\App\Http\Controllers\Auth\LoginController::class,'show'])->name('login');
        Route::post('/login',[\App\Http\Controllers\Auth\LoginController::class,'login'])->name('login.post');
    }
);


Route::group([
    'prefix' => '/admin',
    'middleware'=>'auth',
    'name' => 'admin.',
],
    function(){
        //Home Route
        Route::get('/',[\App\Http\Controllers\admin\HomeController::class,'show'])->name('admin.home');
        //Logout Route
        Route::get('/logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
        //Cruds
        Route::resource('products', ProductsController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('contact', ContactController::class)->only(['index','show','destroy']);
    }
);

