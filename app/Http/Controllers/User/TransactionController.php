<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Halaman checkout dari cart.
     */
    public function checkout()
    {
        return view('user.transaction.checkout');
    }

    /**
     * Halaman pilih metode pembayaran (single order, opsional).
     */
    public function create($menu_id)
    {
        $menu = Menu::findOrFail($menu_id);
        return view('user.transaction.create', compact('menu'));
    }

    /**
     * Menyimpan transaksi dari cart.
     * Status otomatis "done" setelah klik beli sekarang.
     */
    public function store(Request $request)
    {
        try {
            $cart = json_decode($request->input('cart'), true);
            $paymentMethod = $request->input('payment_method');
            $total = $request->input('total');

            if (!$cart || !$paymentMethod || !$total) {
                return back()->withErrors(['msg' => 'Data tidak lengkap!']);
            }

            // Simpan transaksi utama
            $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'menu_id' => $cart[0]['id'], // ✅ isi dengan menu pertama di cart
            'quantity' => array_sum(array_column($cart, 'qty')),
            'total' => $total,
            'payment_method' => $paymentMethod,
            'status' => 'done',
        ]);


            // Update stok untuk tiap menu yang dibeli
            foreach ($cart as $item) {
                $menu = Menu::find($item['id']);
                if ($menu) {
                    $menu->decrement('stok', $item['qty']);
                }
            }

            // Redirect ke halaman detail transaksi
            return redirect()->route('user.transaction.show', $transaction->id)
                             ->with('success', 'Transaksi berhasil!');

        } catch (\Exception $e) {
            \Log::error('Error transaksi: ' . $e->getMessage());
            return back()->withErrors(['msg' => 'Server error: ' . $e->getMessage()]);
        }
    }

    /**
     * Menampilkan detail transaksi user.
     */
    public function show($id)
    {
        $transaction = Transaction::where('user_id', Auth::id())->findOrFail($id);
        return view('user.transaction.show', compact('transaction'));
    }
}
