@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Orders</h2>
    @if(!auth()->user()->isAdmin())
    <a href="{{ route('orders.create') }}" class="btn btn-success">+ Create New Order</a>
    @endif
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th class="text-end">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td class="text-end">
                        <span class="badge bg-info text-dark">Processed</span>

                        {{-- EDIT BUTTON --}}
                        @if(!auth()->user()->isAdmin() && $order->customer_id === auth()->user()->customer->id)
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endif

                        {{-- DELETE (ADMIN ONLY) --}}
                        @if(!auth()->user()->isAdmin() && $order->customer_id === auth()->user()->customer->id)
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">
                        No orders found. Click "Create New Order" to get started.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection