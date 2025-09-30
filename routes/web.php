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
use App\Http\Controllers\SearchController;

// search
Route::get('/search', [SearchController::class, 'index']);
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/', function () {
   
// ambil semua product dari DB
$products = Product::all();
return view('product', compact('products'));
});

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
    return view('product');
});

Route::get('/colors', function () {
    return view('colors');
});

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

//utama //homepage setelah login
Route::get('/', function () {
return view('home');  
});

//kategori//
Route::get('/   interior', function () {
    return view('category.interior');
});

route::get('/eksterior', function () {
    return view('category.eksterior');
});

route::get('/premium', function () {
    return view('category.premium');
});

route::get('/kayubesi', function () {
    return view('category.kayubesi');
});

//finishing//
Route::get('/gloss', function () {
    return view('finishing.gloss');
});

Route::get('/matt', function () {
    return view('finishing.matt');
});

Route::get('/sheen', function () {
    return view('finishing.sheen');
});

// dropdown kategori




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



route::get('/order history', function () {
    return view('pages/order history');
});

//product
Route::get('/products', [ProductController::class, 'index']);


// ketika mengisi form login untuk admin maka diarahkan ke dashboard admin
Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {


    // Rute untuk Halaman Utama Dashboard
    Route::get('/', function () {
        return view('admin.index'); 
    })->name('admin.index');
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('dashboard');
});


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

//profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');    // lihat profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit'); // form edit
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update'); // simpan perubahan
});

Route::get('/searchview', function () {
return view('searchview');  
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
