<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;

Route::get('/', function () {
    return view('landing_page');
});

// Route untuk admin coffe shop
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


    Route::get('/stok', function () {
        return view('admin.stok_produk.index');
    })->name('stok.index');

    // Route Kopi

    Route::prefix('stok/kopi')->group(function () {
        Route::get('/create', [ProductController::class, 'createKopiForm'])->name('form.kopi');


        Route::get('/', [ProductController::class, 'kopi'])->name('stok.kopi');
        Route::get('/edit/{id}', [ProductController::class, 'editKopi'])->name('edit.kopi');
        Route::post('/update/{id}', [ProductController::class, 'updateKopi'])->name('update.kopi');
        Route::post('/create', [ProductController::class, 'createKopi'])->name('create.kopi');
    });

    // Route IceCream
    Route::prefix('stok/iceCream')->group(function () {
        // Form Tambah
        Route::get('/create', [ProductController::class, 'createIceCreamForm'])->name('form.iceCream');

        Route::get('/', [ProductController::class, 'iceCream'])->name('stok.iceCream');
        Route::post('/create', [ProductController::class, 'createIceCream'])->name('create.iceCream');
        Route::get('/edit/{id}', [ProductController::class, 'editIceCream'])->name('edit.iceCream');
        Route::post('/update/{id}', [ProductController::class, 'updateIceCream'])->name('update.iceCream');
        Route::delete('/delete/{id}', [ProductController::class, 'destroyIceCream'])->name('delete.iceCream');
    });



    //Route Roti
    Route::prefix('stok/roti')->group(function () {
        Route::get('/create', [ProductController::class, 'createRotiForm'])->name('form.roti');

        Route::get('/stok/roti', [ProductController::class, 'roti'])->name('stok.roti');
        Route::get('/edit/{id}', [ProductController::class, 'editRoti'])->name('edit.roti');
        Route::post('/update/{id}', [ProductController::class, 'updateRoti'])->name('update.roti');
        Route::post('/create', [ProductController::class, 'createRoti'])->name('create.roti');
    });

    // Route Transaksi
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/{id}', [TransactionController::class, 'show'])->name('transaksi.show');
});



// Route untuk user coffe shop
Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/menu', [\App\Http\Controllers\User\MenuController::class, 'index'])->name('user.menu');
    Route::get('/menu/kategori/{kategori}', [\App\Http\Controllers\User\MenuController::class, 'kategori'])->name('user.menu.kategori');
    Route::get('/menu/{id}', [\App\Http\Controllers\User\MenuController::class, 'show'])->name('user.menu.show');

    // Transaksi
    Route::get('/beli/{menu_id}', [App\Http\Controllers\User\TransactionController::class, 'create'])->name('user.transaction.create');
    Route::post('/beli/{menu_id}', [App\Http\Controllers\User\TransactionController::class, 'store'])->name('user.transaction.store');
    Route::get('/transaksi/{id}', [App\Http\Controllers\User\TransactionController::class, 'show'])->name('user.transaction.show');
});

// Route untuk profile dan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
