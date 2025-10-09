<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserManageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Middleware\AdminMiddleware;
use Resources\views\Admin\Dashboard;
use Resources\views\Admin\Users;
use Resource\views\product_crud;
use function Pest\Laravel\post;

// ----------------- Search -----------------
Route::get('/search', [SearchController::class, 'index']);
Route::get('/search', [SearchController::class, 'index'])->name('search');

// ----------------- Home -----------------
Route::get('/', function () {
    // ambil semua product dari DB
    $products = Product::all();
    return view('product', compact('products'));
});

Route::get('/', function () {
    return 'Halo, ini dashboard!';
})->middleware('auth');

Route::get('/', function () {
    return view('home');
});

// ----------------- CRUD -----------------
Route::resource('product_crud', ProductController::class);
Route::resource('products', ProductController::class);

Route::get('product_crud/{id}/edit', [ProductController::class, 'edit'])->name('product_crud.edit');
Route::post('product_crud/{id}/edit', [ProductController::class, 'edit'])->name('product_crud.edit');
Route::get('product_crud', [ProductController::class, 'index'])->name('product_crud.index');
Route::post('product_crud', [ProductController::class, 'store'])->name('product_crud.store');
Route::put('product_crud/{id}', [ProductController::class, 'update'])->name('product_crud.update');
Route::delete('product_crud/{id}', [ProductController::class, 'destroy'])->name('product_crud.destroy');

// ----------------- Auth -----------------
Route::get('/register', [AuthenticatedSessionController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthenticatedSessionController::class, 'register']);

Route::get('/login', [AuthenticatedSessionController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// ----------------- Pages -----------------
Route::get('/product', fn() => view('product'));
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/colors', fn() => view('colors'));
Route::get('/cart', fn() => view('cart'))->name('cart');

// Kategori
Route::get('/interior', fn() => view('category.interior'));
Route::get('/eksterior', fn() => view('category.eksterior'));
Route::get('/premium', fn() => view('category.premium'));
Route::get('/kayubesi', fn() => view('category.kayubesi'));

// Finishing
Route::get('/gloss', fn() => view('finishing.gloss'));
Route::get('/matt', fn() => view('finishing.matt'));
Route::get('/sheen', fn() => view('finishing.sheen'));

// Pages
Route::get('/pages', fn() => view('pages'));
Route::get('/cart', fn() => view('pages/cart'));
Route::get('/checkout', fn() => view('pages/checkout'));
Route::get('/payment success', fn() => view('pages/payment success'));
Route::get('/order history', fn() => view('pages/order history'));

// Diskon
Route::get('/diskon', fn() => view('pages.diskon'));


// ----------------- Dashboard -----------------
Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', fn() => view('admin.index'))->name('admin.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

// ----------------- User Management -----------------
Route::resource('user_manage', UserManageController::class);
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/user-manage', [UserManageController::class, 'index'])->name('user_manage.index');
    Route::get('/user-manage/{id}', [UserManageController::class, 'show'])->name('user_manage.show');
    Route::post('/user-manage/{id}/update-role', [UserManageController::class, 'updateRole'])->name('user_manage.updateRole');
    Route::post('/user-manage/{id}/update-status', [UserManageController::class, 'updateStatus'])->name('user_manage.updateStatus');
});


Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show']);
});


// ----------------- Profile -----------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// ----------------- Misc -----------------
Route::get('/searchview', fn() => view('searchview'));

// ----------------- Cart -----------------
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

// ----------------- Checkout -----------------
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::post('/checkout/shipping', [CheckoutController::class, 'storeShipping'])->name('checkout.shipping');


// ----------------- Orders -----------------
Route::middleware('auth')->group(function () {
    Route::post('/order', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/order/{order}', [OrderController::class, 'index'])->name('orders.index');
});
