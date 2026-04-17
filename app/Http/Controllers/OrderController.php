<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer; // ✅ ADD THIS

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer', 'product')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();

        if (auth()->user()->isAdmin()) {
            abort(403);
        }

        $customers = Customer::where('user_id', auth()->id())->get();

        return view('orders.create', compact('products', 'customers'));
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        if (auth()->user()->isAdmin()) {
            abort(403);
        }

        $product = Product::findOrFail($request->product_id);
        $customer = auth()->user()->customer;

        Order::create([
            'customer_id' => $customer->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $product->price * $request->quantity,
        ]);

        return redirect()->route('orders.index');
    }

    public function edit(Order $order) // ✅ FIXED
    {
        if (
            !auth()->user()->isAdmin() &&
            $order->customer_id !== auth()->user()->customer->id
        ) {
            abort(403);
        }

        $products = Product::all();

        return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        if (auth()->user()->isAdmin()) {
            abort(403);
        }

        if ($order->customer_id !== auth()->user()->customer->id) {
            abort(403);
        }

        $product = Product::findOrFail($request->product_id);

        $order->update([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $product->price * $request->quantity,
        ]);

        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        if (auth()->user()->isAdmin()) {
            abort(403);
        }

        if ($order->customer_id !== auth()->user()->customer->id) {
            abort(403);
        }

        $order->delete();

        return redirect()->route('orders.index');
    }
}
