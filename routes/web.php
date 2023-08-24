<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\SubscribeController;
use App\Http\Controllers\admin\SurveyController;
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
        Route::get('/product/{id}', [\App\Http\Controllers\website\ProductsController::class, 'show'])->name('product.show');
        Route::get('/survey', [\App\Http\Controllers\website\SurveyController::class, 'index'])->name('survey.index');
        Route::post('/survey', [\App\Http\Controllers\website\SurveyController::class, 'create'])->name('survey.create');
        Route::post('/subscribe', [\App\Http\Controllers\website\SubscribeController::class, 'create'])->name('subscribe.create');

        //Cart
        Route::get('/cart',[\App\Http\Controllers\website\CartController::class, 'showCart'])->name('cart.show');
        Route::post('/cart/add',[\App\Http\Controllers\website\CartController::class, 'addItemToCart'])->name('cart.add');
        Route::post('/cart/update',[\App\Http\Controllers\website\CartController::class, 'updateProduct'])->name('cart.update');
        Route::get('/cart/delete/{id}',[\App\Http\Controllers\website\CartController::class, 'deleteItemToCart'])->name('cart.delete');
        Route::get('/checkout',[\App\Http\Controllers\website\CartController::class, 'checkOut'])->name('cart.checkout');
        Route::post('/finish-order',[\App\Http\Controllers\website\CartController::class, 'finishOrder'])->name('cart.finish.order');
        Route::get('/thanks/{id}',[\App\Http\Controllers\website\CartController::class, 'thanks'])->name('cart.thanks');

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

        //Export
        Route::get('subscribe/export/', [SubscribeController::class, 'export'])->name('subscribe.excel');

        //Cruds
        Route::resource('products', ProductsController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('contact', ContactController::class)->only(['index','show','destroy']);
        Route::resource('orders', OrdersController::class)->only(['index','show']);
        Route::resource('surveys', SurveyController::class)->only(['index','show']);
        Route::resource('subscribe', SubscribeController::class)->only(['index']);
    }
);

