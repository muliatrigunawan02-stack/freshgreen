<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanjaan kamu kosong blay!');
        }
        return view('checkout.index', compact('cart'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'payment_method' => 'required|string',
        ]);

        // Hapus session keranjang setelah checkout sukses
        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat! Sayur & buah segar siap dikirim ke rumahmu!');
    }
}