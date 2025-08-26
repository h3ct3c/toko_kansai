<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Resource\views\product_crud;
use App\Http\Controllers\ProductController;
use Resources\views\Admin\Dashboard;
use Resources\views\Admin\Users;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Middleware\Authenticate;
use illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use function Pest\Laravel\post;
use illuminate\Http\Middleware\AdminMiddleware;

// CRUD
Route::resource('product_crud', ProductController::class);
Route::get('product_crud/{id}/edit', [ProductController::class, 'edit'])->name('product_crud.edit');
Route::post('product_crud/{id}/edit', [ProductController::class, 'edit'])->name('product_crud.edit');
Route::get('product_crud', [ProductController::class, 'index'])->name('product_crud.index');
Route::post('product_crud', [ProductController::class, 'store'])->name('product_crud.store');
Route::put('product_crud/{id}', [ProductController::class, 'update'])->name('product_crud.update');
Route::delete('product_crud/{id}', [ProductController::class, 'destroy'])->name('product_crud.destroy');


// LOGIN AND REGISTER

Route::get('/register', [AuthenticatedSessionController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthenticatedSessionController::class, 'register']);
Route::get('/login', [AuthenticatedSessionController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);

// Tampilkan form login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

// Proses login
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

// Proses logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Dashboard (hanya bisa diakses user login)
Route::get('/', function () {
    return 'Halo, ini dashboard!';
})->middleware('auth');



//homepage//

Route::get('/product', function () {
    return view('product');
});

Route::get('/colors', function () {
    return view('colors');
});

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/', function () {
return view('home');  
});

//kategori//
Route::get('/category', function () {
    return view('category');
});

Route::get('/cat_kayu_besi', function () {
    return view('category/cat_kayu_besi');
});

route::get('/cat_eksterior', function () {
    return view('category/cat_eksterior');
});

route::get('/cat_premium', function () {
    return view('category/cat_premium');
});

route::get('/cat_interior', function () {
    return view('category/cat_interior');
});

//produk//


//pages//
route::get('/pages', function () {
    return view('pages');
});

route::get('/cart', function () {
    return view('pages/cart');
});

route::get('/checkout', function () {
    return view('pages/checkout');
});

route::get('/payment success', function () {
    return view('pages/payment success');
});

route::get('/product_detail', function () {
    return view('pages/product_detail');
});

route::get('/order history', function () {
    return view('pages/order history');
});

//product
Route::get('/products', [ProductController::class, 'index']);


// admin dashboard
Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    
    // Rute untuk Halaman Utama Dashboard
    Route::get('/', function () {
        return view('admin.index'); 
    })->name('admin/dashboard');


    // Rute untuk Halaman Products
    Route::get('/product_management', function () {
        // Ini akan mencari file di resources/views/admin/products.blade.php
        return view('admin.products');
    })->name('product_management');


    

});
    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });



require __DIR__.'/auth.php';



