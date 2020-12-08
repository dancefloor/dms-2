<x-app-layout>
    <x-slot name="header">
        <div
            class="bg-white border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Payments
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">
                <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
                    <button type="button" class="df-btn-secondary">
                        Export
                    </button>
                </span>
                <span class="order-0 sm:order-1 sm:ml-3 shadow-sm rounded-md">
                    <a href="{{ route('payments.create') }}" class="df-btn-primary">
                        Add Payment
                    </a>
                </span>
            </div>
        </div>
    </x-slot>
    <livewire:payment.datatable />
</x-app-layout>