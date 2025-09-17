<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Daftar transaksi (riwayat) admin.
     */
    public function index()
    {
        $transactions = Transaction::with('user', 'menu', 'order')->latest()->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Detail transaksi (gunakan tampilan detail pesanan agar konsisten)
     */
    public function show($id)
    {
        $transaction = Transaction::with('user', 'menu')->findOrFail($id);
        return view('admin.pesanan.detail', compact('transaction'));
    }
}
