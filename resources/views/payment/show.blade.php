<x-app-layout>
    <x-slot name="header">
        <div class="bg-white border-b border-gray-200 px-2 py-4 flex items-center justify-between">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                Back
            </a>
            <div class="min-w-0 ml-2">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Payment details
                </h1>
            </div>
            <div class="flex sm:mt-0 sm:ml-4">
                <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
                    <a href="{{ route('payments.edit', $payment )}}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                        Edit
                    </a>
                </span>
                <span class="order-0 sm:order-1 sm:ml-3 shadow-sm rounded-md">
                    @include('shared.delete',['item'=> $payment, 'action'=>'payments.destroy', 'type'=> 'button'])
                </span>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Payment Information
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    Created on {{ $payment->created_at->format('M d, Y') }}
                </p>
            </div>
            <div class="px-4 py-5 sm:p-0">
                <dl>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            ID
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $payment->id }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            User
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $payment->user->name }} {{ $payment->user->lastname }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Method
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $payment->method }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Status
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-shared.display-status status="{{ $payment->status }}" />
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Provider
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $payment->provider }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Amount
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $payment->amount }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Amount received
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $payment->amount_received }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Currency
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $payment->currency }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Received date
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $payment->received_date }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Mollie ID
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $payment->mollie_payment_id }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Code
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $payment->code }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            comments
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $payment->comments }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Order(s)
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul class="border border-gray-200 rounded-md">
                                {{-- @forelse ($item->permissions as $p)
                                <li
                                    class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5 {{ $loop->last ? '':'border-b border-gray-200'}}">
                                <div class="w-0 flex-1 flex items-center text-gray-700">
                                    @include('icons.user-access')
                                    <span class="ml-2 flex-1 w-0 truncate">
                                        {{ $p->name }}
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="{{ route('permissions.show', $p) }}"
                                        class="font-medium text-red-700 hover:text-red-800 transition duration-150 ease-in-out">
                                        Details
                                    </a>
                                </div>
                                </li>
                                @empty
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                                    There are no permissions attached to this role
                                </li>
                                @endforelse --}}
                            </ul>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>