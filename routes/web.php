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
use App\Http\Controllers\ProductFrontController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;





Route::get('cart', [CartController::class, 'index'])->name('cart.index');

// search
Route::get('/search', [SearchController::class, 'index']);
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search', [SearchController::class, 'index'])->name('search');


// CRUD
Route::resource('product_crud', ProductController::class);
Route::resource('products', ProductController::class);
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
    return view('layouts.product');
});

Route::get('/colors', function () {
    return view('layouts.colors');
});

Route::get('/cart', function () {
    return view('cart.index');
})->name('cart');

//utama //homepage setelah login
Route::get('/', function () {
return view('layouts.app');  
});

//kategori//
Route::get('/   interior', function () {
    return view('category.interior');
});

Route::get('/eksterior', function () {
    return view('category.eksterior');
});

Route::get('/premium', function () {
    return view('category.premium');
});

Route::get('/kayubesi', function () {
    return view('category.kayubesi');
});



// dropdown kategori





Route::get('/cart', function () {
    return view('pages.cart');
});

Route::get('/checkout', function () {
    return view('pages.checkout');
});

Route::get('/payment success', function () {
    return view('pages.payment success');
});



Route::get('/order history', function () {
    return view('pages.order history');
});

//product



// ketika mengisi form login untuk admin maka diarahkan ke dashboard admin




// DETAIL PRODUK
Route::get('ftalitduo', function () {
    return view('detail.ftalitduo');
});

Route::get('ftalitduo', function () {
    return view('detail.ftalitduo');

});
Route::get('ftalit', function () {
    return view('detail.ftalit');

});

Route::get('spleshglimmer', function () {
    return view('detail.spleshglimmer');
});

Route::get('splesh', function () {
    return view('detail.splesh');
});

Route::get('diamondshield', function () {
    return view('detail.diamondshield');
});

Route::get('pearlsheen', function () {
    return view('detail.pearlsheen');
});

Route::get('rainblock', function () {
    return view('detail.rainblock');
});

Route::get('propertyeks', function () {
    return view(view: 'detail.propertyeks');
});

Route::get('propertyint', function () {
    return view('detail.propertyint');
});

Route::get('ftalit', function () {
    return view('detail.ftalit');
});

Route::get('tropic', function () {
    return view('detail.tropic');
});



//diskon//
Route::get('/diskon', function () {
    return view('pages.diskon');
});

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
});





Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::patch('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');



Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])
        ->name('cart.add');
});

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');




Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');



Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::patch('/cart/update/{item}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::delete('/cart/remove/{item}', [CartController::class, 'removeItem'])->name('cart.removeItem');




// Admin CRUD
Route::resource('product_crud', ProductController::class);
// Frontend product list
Route::get('/products', [ProductController::class, 'productList'])->name('products.index');




Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');



// Admin
Route::resource('product_crud', ProductController::class)->middleware('auth');

// Frontend (user)
Route::get('/products', [ProductController::class, 'productList'])->name('products.index');




Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');
