<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function checkout()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();

        if ($carts == null) {
            return Redirect::back();
        }

        $order = Order::create([
            'user_id' => $user_id
        ]);

        //Membuat transaksi dengan loop
        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);

            $product->update([
                'stock' => $product->stock - $cart->amount
            ]);
            Transaction::create([
                'amount' => $cart->amount,
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
            ]);
            $cart->delete();
        }
        return Redirect::back();
    }

    public function index_order()
    {
        $user = Auth::user();
        $admin = $user->is_admin;
        if ($admin) {

            $orders = Order::all();
        } else {
            $orders = Order::where('user_id', $user->id)->get();
        }
        return view('Order.index', compact('orders'));
    }

    public function show_order(Order $order)
    {
        $user = Auth::user();
        $admin = $user->is_admin;
        if ($admin || $order->user_id == $user->id) {

            return view('order.show', compact('order'));
        }
        return Redirect::route('index_product');
    }

    public function submit_payment_receipt(Order $order, Request $request)
    {
        $file_pr = $request->file('payment_receipt');
        $path = time() . '_' . $order->id . '.' . $file_pr->getClientOriginalExtension();
        Storage::disk('local')->put('public/Pembayaran/' . $path, file_get_contents($file_pr));

        $order->update([
            'payment_receipt' => $path
        ]);

        return Redirect::back();
    }

    public function confirm_payment(Order $order)
    {
        $order->update([
            'is_paid' => true
        ]);
        return Redirect::route('index_order');
    }
}
