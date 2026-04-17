<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('System Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100 d-flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold">Welcome back, {{ auth()->user()->name }}! 👋</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Manage your customers, products, and orders below.</p>
                    </div>
                    <div>
                        @if(auth()->user()->isAdmin())
                            <span class="px-3 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">Administrator</span>
                        @else
                            <span class="px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">Staff Member</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-b-4 border-blue-500">
                    <div class="p-6 text-center">
                        <div class="text-3xl mb-2">👥</div>
                        <h5 class="text-xl font-semibold mb-4 dark:text-white">Customers</h5>
                        <a href="{{ route('customers.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Manage Customers
                        </a>
                    </div>
                </div>

                @if(auth()->user()->isAdmin())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-b-4 border-yellow-500">
                    <div class="p-6 text-center">
                        <div class="text-3xl mb-2">📦</div>
                        <h5 class="text-xl font-semibold mb-4 dark:text-white">Products</h5>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Inventory Management
                        </a>
                    </div>
                </div>
                @endif

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-b-4 border-green-500">
                    <div class="p-6 text-center">
                        <div class="text-3xl mb-2">🛒</div>
                        <h5 class="text-xl font-semibold mb-4 dark:text-white">Orders</h5>
                        <a href="{{ route('orders.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            View All Orders
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>