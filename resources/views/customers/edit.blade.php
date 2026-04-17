@extends('layout')

@section('content')
<h2>Edit Customer</h2>

<form action="{{ route('customers.update', $customer->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $customer->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Address</label>
        <input type="text" name="address" value="{{ $customer->address }}" class="form-control">
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection