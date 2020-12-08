<x-app-layout>
    <x-slot name="header">
        <div
            class="bg-white border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Edit Payment
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">
                <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
                    <a href="{{ route('payments.index') }}" class="df-btn-secondary">
                        Back
                    </a>
                </span>
            </div>
        </div>
    </x-slot>
    <section class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <livewire:payment.form action="edit" :payment="$payment" />
    </section>
</x-app-layout>