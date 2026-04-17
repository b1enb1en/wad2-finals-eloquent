@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white"><h4>Create New Order</h4></div>
            <div class="card-body">
                <form method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Select Customer</label>
                        <select name="customer_id" class="form-select">
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Select Product</label>
                        <select name="product_id" class="form-select">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} (${{ $product->price }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="1">
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-success">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection