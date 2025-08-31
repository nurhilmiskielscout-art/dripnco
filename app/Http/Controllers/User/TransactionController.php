<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // Halaman pilih metode pembayaran
    public function create($menu_id)
    {
        $menu = Menu::findOrFail($menu_id);
        return view('user.transaction.create', compact('menu'));
    }

    // Simpan transaksi
    public function store(Request $request, $menu_id)
    {
        $menu = Menu::findOrFail($menu_id);

        $request->validate([
            'payment_method' => 'required|in:transfer,cod',
            'quantity' => 'required|integer|min:1'
        ]);

        // buat transaksi
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'menu_id' => $menu->id,
            'quantity' => $request->quantity,
            'total' => $menu->harga * $request->quantity,
            'payment_method' => $request->payment_method,
            'status' => 'done', // default done
        ]);

        // kurangi stok menu
        $menu->decrement('stok', $request->quantity);

        return redirect()
            ->route('user.transaction.show', $transaction->id)
            ->with('success', 'Transaksi berhasil!');
    }

    // Detail transaksi user
    public function show($id)
    {
        $transaction = Transaction::where('user_id', Auth::id())->findOrFail($id);
        return view('user.transaction.show', compact('transaction'));
    }
}
