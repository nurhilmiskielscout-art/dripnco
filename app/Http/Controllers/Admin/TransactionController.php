<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // List semua transaksi
    public function index()
    {
        $transactions = Transaction::with('user', 'menu')->latest()->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    // Detail transaksi
    public function show($id)
    {
        $transaction = Transaction::with('user', 'menu')->findOrFail($id);
        return view('admin.transactions.show', compact('transaction'));
    }
}
