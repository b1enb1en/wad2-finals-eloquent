@extends('layout')

@section('content')
<div class="container">
    <h2>Edit Order</h2>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- PRODUCT --}}
        <div class="mb-3">
            <label>Product</label>
            <select name="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}"
                        {{ $order->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} - ${{ $product->price }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- QUANTITY --}}
        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" 
                   value="{{ $order->quantity }}" 
                   class="form-control" required>
        </div>

        {{-- TOTAL DISPLAY ONLY --}}
        <div class="mb-3">
            <label>Total Price</label>
            <input type="text" 
                   value="${{ number_format($order->total_price, 2) }}" 
                   class="form-control" disabled>
        </div>

        <button class="btn btn-warning">Update Order</button>
    </form>
</div>
@endsection