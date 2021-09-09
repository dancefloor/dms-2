<x-app-layout>
    <x-slot name="header">
        <div
            class="bg-white border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Orders
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">
                <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
                    <a href="{{ route('orders.export') }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                        Export
                    </a>
                </span>
                <span class="order-0 sm:order-1 sm:ml-3 shadow-sm rounded-md">
                    <a href="{{ route('orders.create') }}" class="df-btn-primary">
                        Add Order
                    </a>
                </span>
            </div>
        </div>
    </x-slot>

    <div class="mx-3 sm:mx-4 md:mx-5 lg:mx-6 xl:mx-8 my-4">
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
            <x-partials.user-balance :user="auth()->user()" />
        </div>
    </div>

    <livewire:order.datatable :user="auth()->user()" />
</x-app-layout>