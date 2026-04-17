@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Product Inventory</h2>
    @if(auth()->user()->isAdmin())
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    @endif
</div>

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <h6 class="card-subtitle mb-2 text-primary font-weight-bold">${{ number_format($product->price, 2) }}</h6>
                <p class="card-text">
                    <span class="badge {{ $product->stock > 10 ? 'bg-success' : 'bg-danger' }}">
                        Stock: {{ $product->stock }}
                    </span>
                </p>
            </div>
            @if(auth()->user()->isAdmin())
            <div class="card-footer bg-transparent border-top-0 d-flex gap-2">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning w-100">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="w-100">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger w-100">Delete</button>
                </form>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection