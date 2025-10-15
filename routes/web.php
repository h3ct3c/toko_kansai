<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\admin\ProductCrudController;
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
Route::prefix('product_crud')->name('product_crud.')->group(function () {
    Route::get('/', [ProductCrudController::class, 'index'])->name('index'); // Halaman utama produk
    Route::get('/create', [ProductCrudController::class, 'create'])->name('create'); // Form tambah produk
    Route::post('/', [ProductCrudController::class, 'store'])->name('store'); // Simpan produk baru
    Route::get('/{product}', [ProductCrudController::class, 'showAdmin'])->name('show'); // Detail produk
    Route::get('/{product}/edit', [ProductCrudController::class, 'edit'])->name('edit'); // Edit produk
    Route::put('/{product}', [ProductCrudController::class, 'update'])->name('update'); // Update produk
    Route::delete('/{product}', [ProductCrudController::class, 'destroy'])->name('destroy'); // Hapus produk
});

// PUBLIC (user)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/category/{categoryId}', [ProductController::class, 'byCategory'])->name('products.byCategory');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

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

// Diskon
Route::get('/diskon', fn() => view('pages.diskon'));


// ----------------- Dashboard -----------------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

// ----------------- User Management -----------------
Route::resource('user_manage', UserManageController::class);
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/user-manage', [UserManageController::class, 'index'])->name('user_manage.index');
    Route::get('/user-manage/{id}', [UserManageController::class, 'show'])->name('user_manage.show');
    Route::get('/user-manage/{id}/edit', [UserManageController::class, 'edit'])->name('user_manage.edit');
    Route::post('/user-manage/{id}/update-role', [UserManageController::class, 'updateRole'])->name('user_manage.updateRole');
    Route::post('/user-manage/{id}/update-status', [UserManageController::class, 'updateStatus'])->name('user_manage.updateStatus');
    Route::delete('/user_manage/bulk-delete', [UserManageController::class, 'bulkDelete'])->name('user_manage.bulk_delete');
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
Route::middleware(['auth'])->group(function () {
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order', [OrderController::class, 'show'])->name('order.show');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
});


// Bagian admin CRUD
Route::prefix('order_crud')->middleware(['auth'])->group(function () {
    Route::get('/', [OrderController::class, 'orderCrudIndex'])->name('orderCrud.index');
    Route::get('/create', [OrderController::class, 'orderCrudCreate'])->name('orderCrud.create');
    Route::post('/store', [OrderController::class, 'orderCrudStore'])->name('orderCrud.store');
    Route::get('/{id}/edit', [OrderController::class, 'orderCrudEdit'])->name('orderCrud.edit');
    Route::put('/{id}', [OrderController::class, 'orderCrudUpdate'])->name('orderCrud.update');
    Route::delete('/{id}', [OrderController::class, 'orderCrudDestroy'])->name('orderCrud.destroy');
});

