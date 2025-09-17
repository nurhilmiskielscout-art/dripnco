<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\User\TransactionController as UserTransactionController;
use App\Http\Controllers\Admin\PesananController;
use App\Models\User;
use App\Models\Menu;
use App\Http\Controllers\AboutUsController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing_page');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    // Pendapatan
    Route::get('/pendapatan', function () {
        return view('admin.pendapatan.pendapatan');
    })->name('admin.pendapatan');

    // Data Pelanggan
    Route::get('/data-pelanggan', function () {
        return view('admin.data_pelanggan.data');
    })->name('admin.data.pelanggan');
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/stok', function (Request $request) {
        $category = $request->query('category');
        $products = null;
        if ($category) {
            $products = Menu::where('category', $category)->get();
        }
        return view('admin.stok_produk.index', compact('products', 'category'));
    })->name('stok.index');

    // Kopi
    Route::prefix('stok/kopi')->group(function () {
        Route::get('/create', [ProductController::class, 'createKopiForm'])->name('form.kopi');
        Route::get('/', [ProductController::class, 'kopi'])->name('stok.kopi');
        Route::get('/edit/{id}', [ProductController::class, 'editKopi'])->name('edit.kopi');
        Route::post('/update/{id}', [ProductController::class, 'updateKopi'])->name('update.kopi');
        Route::post('/create', [ProductController::class, 'createKopi'])->name('create.kopi');
        Route::delete('/delete/{id}', [ProductController::class, 'destroyKopi'])->name('delete.kopi');
    });

    // IceCream
    Route::prefix('stok/iceCream')->group(function () {
        Route::get('/create', [ProductController::class, 'createIceCreamForm'])->name('form.iceCream');
        Route::get('/', [ProductController::class, 'iceCream'])->name('stok.iceCream');
        Route::post('/create', [ProductController::class, 'createIceCream'])->name('create.iceCream');
        Route::get('/edit/{id}', [ProductController::class, 'editIceCream'])->name('edit.iceCream');
        Route::post('/update/{id}', [ProductController::class, 'updateIceCream'])->name('update.iceCream');
        Route::delete('/delete/{id}', [ProductController::class, 'destroyIceCream'])->name('delete.iceCream');
    });

    // Roti
    Route::prefix('stok/roti')->group(function () {
        Route::get('/create', [ProductController::class, 'createRotiForm'])->name('form.roti');
        Route::get('/', [ProductController::class, 'roti'])->name('stok.roti');
        Route::get('/edit/{id}', [ProductController::class, 'editRoti'])->name('edit.roti');
        Route::post('/update/{id}', [ProductController::class, 'updateRoti'])->name('update.roti');
        Route::post('/create', [ProductController::class, 'createRoti'])->name('create.roti');
        Route::delete('/delete/{id}', [ProductController::class, 'destroyRoti'])->name('delete.roti');
    });

    // Transaksi
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/{id}', [TransactionController::class, 'show'])->name('transaksi.show');

    // Detail Pesanan (Admin)
    // Route::get('/pesanan/pesanan', function () {
    //     return view('admin.pesanan.pesanan');
    // })->name('admin.pesanan.pesanan');

    //   Route::get('/pesanan/detail', function () {
    //     return view('admin.pesanan.detail');
    // })->name('admin.pesanan.detail');

    // Rute untuk menampilkan daftar pesanan
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');

    // Rute ini tidak punya parameter segmen
Route::get('/pesanan/{id}/detail', [PesananController::class, 'show'])->name('pesanan.show');

    Route::post('/pesanan/{id}/siap', [PesananController::class, 'pesananSiap'])->name('pesanan.siap');
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/menu', [\App\Http\Controllers\User\MenuController::class, 'index'])->name('user.menu');
    Route::get('/menu/kategori/{kategori}', [\App\Http\Controllers\User\MenuController::class, 'kategori'])->name('user.menu.kategori');
    Route::get('/menu/{id}', [\App\Http\Controllers\User\MenuController::class, 'show'])->name('user.menu.show');

    // Order
    // Route::post('/order', [\App\Http\Controllers\User\OrderController::class, 'store'])->name('user.order.store');
    
    // Transaksi
    Route::get('/beli/{menu_id}', [\App\Http\Controllers\User\TransactionController::class, 'create'])->name('user.transaction.create');
    // Route::post('/beli/{menu_id}', [\App\Http\Controllers\User\TransactionController::class, 'store'])->name('user.transaction.store');
    Route::get('/transaksi/{id}', [\App\Http\Controllers\User\TransactionController::class, 'show'])->name('user.transaction.show');

    Route::post('/order', [\App\Http\Controllers\User\TransactionController::class, 'store'])->name('user.transaction.store');

        // Checkout page
    Route::get('/checkout', [App\Http\Controllers\User\TransactionController::class, 'checkout'])->name('user.checkout');

    // Proses transaksi

    // Detail transaksi
    Route::get('/transaction/{id}', [App\Http\Controllers\User\TransactionController::class, 'show'])->name('user.transaction.show');

});

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Auth (langsung digabung di sini)
|--------------------------------------------------------------------------
*/ 

// Login form
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

// Proses login
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended(
            Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard')
        );
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
})->middleware('guest');

// Register form
Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest')->name('register');

// Proses register
Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

   $user = User::create([
    'name' => $validated['name'],
    'username' => $validated['email'], // tambahin baris ini biar gak error
    'email' => $validated['email'],
    'password' => bcrypt($validated['password']),
    'role' => 'user', // default user
]);

    Auth::login($user);
    return redirect()->route('user.dashboard');
})->middleware('guest');

// Logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->middleware('auth')->name('logout');

// About Us
Route::get('/about_us', function () {
    return view('user.about_us');
})->name('about_us');

// notifikasi
Route::get('/notifikasi', function () {
    return view('user.notifikasi');
})->name('notifikasi');

Route::get('/lokasi', function () {
    return view('user.lokasi');
})->name('lokasi');

Route::get('/sosmed', function () {
    return view('user.sosmed');
})->name('sosmed');

