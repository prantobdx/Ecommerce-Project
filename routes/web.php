<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[EcommerceController::class,'index'])->name('/');
Route::get('/product-details/{id}',[EcommerceController::class,'productDetails'])->name('product-details');


Route::get('/customer-register',[CustomerController::class,'CustomerRegister'])->name('customer-register');
Route::post('/save-customer',[CustomerController::class,'saveCustomer'])->name('save-customer');
Route::get('/customer-login',[CustomerController::class,'customerLogin'])->name('customer-login');
Route::post('/check-login',[CustomerController::class,'checkLogin'])->name('check-login');
Route::get('/customer-logout',[CustomerController::class,'Logout'])->name('customer-logout');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'
])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('/add-product',[ProductController::class,'addProduct'])->name('add-product');
    Route::post('/create-product',[ProductController::class,'createProduct'])->name('create-product');
    Route::get('/manage-product',[ProductController::class,'manageProduct'])->name('manage-product');
    Route::post('/delete-product',[ProductController::class,'deleteProduct'])->name('delete-product');
    Route::get('/edit-product/{id}',[ProductController::class,'editProduct'])->name('edit-product');
    Route::post('/update-product',[ProductController::class,'updateProduct'])->name('update-product');
    Route::get('/status/{id}',[ProductController::class,'status'])->name('status');
});

//1:21:26 C:51
