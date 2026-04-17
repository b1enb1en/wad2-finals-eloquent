@extends('layout')

@section('content')
<h2>Add Product</h2>

<form method="POST" action="{{ route('products.store') }}">
    @csrf

    <input type="text" name="name" class="form-control mb-2" placeholder="Name">
    <input type="number" name="price" class="form-control mb-2" placeholder="Price">
    <input type="number" name="stock" class="form-control mb-2" placeholder="Stock">

    <button class="btn btn-success">Save</button>
</form>
@endsection