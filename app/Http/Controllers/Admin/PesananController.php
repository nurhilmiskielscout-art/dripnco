<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Menampilkan daftar pesanan (orders) terbaru.
     */
    public function index()
    {
        $orders = Order::with('user', 'orderItems.menu')->latest()->get();
        return view('admin.pesanan.pesanan', compact('orders'));
    }

    /**
     * Menampilkan detail satu pesanan (order).
     */
    public function show($id)
    {
        $order = Order::with('user', 'orderItems.menu')->findOrFail($id);
        return view('admin.pesanan.detail', compact('order'));
    }

    /**
     * Tandai pesanan siap: langsung set ke completed jika belum cancelled/completed
     */
    public function pesananSiap($id)
    {
        $order = Order::findOrFail($id);

        if (in_array($order->status, ['cancelled', 'completed'])) {
            return redirect()->back()->with('error', 'Pesanan tidak dapat disiapkan pada status saat ini.');
        }

        $order->status = 'completed';
        $order->save();

        // Create transaction records for each order item
        foreach ($order->orderItems as $item) {
            Transaction::create([
                'user_id' => $order->user_id,
                'menu_id' => $item->menu_id,
                'quantity' => $item->qty,
                'total' => $item->price * $item->qty,
                'payment_method' => $order->payment_method,
                'status' => 'done',
                'order_id' => $order->id,
            ]);
        }

        // Di sini Anda dapat menambahkan logic notifikasi (event/email/push) jika diperlukan
        return redirect()->route('pesanan.show', ['id' => $order->id])->with('success', 'Pesanan sudah siap.');
    }
}
