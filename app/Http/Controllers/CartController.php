<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function tambah_keranjang(Request $request, Product $product, Cart $cart)
    {
        $user_id = Auth::id();
        $product_id = $product->id;

        $request->validate([
            'amount' => 'required|gte:1|lte:' . $product->stock
        ]);

        $existing_cart = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();

        if ($existing_cart == null) {
            $request->validate([
                'amount' => 'required|gte:1|lte:' . $product->stock
            ]);

            Cart::create([
                'amount' => $request->amount,
                'user_id' => $user_id,
                'product_id' => $product_id,
            ]);
        } else {
            $request->validate([
                'amount' => 'required|gte:1|lte:' . ($product->stock - $existing_cart->amount)
            ]);

            $existing_cart->update([
                'amount' => $existing_cart->amount + $request->amount
            ]);
        }
        return Redirect::route('show_keranjang');
    }

    public function show_cart()
    {
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->get();
        return view('cart.show', compact('cart'));
    }
    public function update_process(Request $request, Cart $cart)
    {
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $cart->product->stock,
        ]);

        $cart->update([
            'amount' => $request->amount,
        ]);

        return Redirect::route('show_keranjang');
    }

    public function delete_cart(Cart $cart)
    {
        $cart->delete();
        return Redirect::route('show_keranjang');
    }
}
