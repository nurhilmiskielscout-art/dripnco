<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cart' => 'required|array',
            'cart.*.name' => 'required|string',
            'cart.*.price' => 'required|numeric',
            'cart.*.qty' => 'required|integer|min:1',
            'payment_method' => 'required|string|in:QRIS,DANA,GoPay',
            'total' => 'required|numeric',
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $cart = $request->cart;
        $payment = $request->payment_method;
        $total = $request->total;

        // Map payment to enum
        $paymentMethod = match($payment) {
            'QRIS' => 'qris',
            'DANA' => 'ewallet',
            'GoPay' => 'ewallet',
            default => 'ewallet'
        };

        // Generate order code
        $orderCode = 'ORD-' . time() . '-' . $user->id;

        // Create order
        $order = Order::create([
            'user_id' => $user->id,
            'order_code' => $orderCode,
            'subtotal' => $total,
            'total' => $total,
            'payment_method' => $paymentMethod,
            'status' => 'pending',
        ]);

        // Create order items
        foreach ($cart as $item) {
            $menu = Menu::where('nama_produk', $item['name'])->first();
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $menu ? $menu->id : null,
                'nama_produk' => $item['name'],
                'harga' => $item['price'],
                'quantity' => $item['qty'],
                'subtotal' => $item['price'] * $item['qty'],
            ]);
        }

        return response()->json([
            'success' => true,
            'order_code' => $orderCode,
            'total' => $total,
            'payment' => $payment,
        ]);
    }
}
