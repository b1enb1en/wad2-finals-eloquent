<h1>Add Customer</h1>

<form action="{{ route('customers.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Name">
    <input type="text" name="address" placeholder="Address">

    <button type="submit">Save</button>
</form>