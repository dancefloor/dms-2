<x-app-layout>
    <x-slot name="header">
        <div
            class="bg-white border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Order registered with success
                </h1>
            </div>
            {{-- <div class="mt-4 flex sm:mt-0 sm:ml-4">
                <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                        Export
                    </button>
                </span>
                <span class="order-0 sm:order-1 sm:ml-3 shadow-sm rounded-md">
                    <a href="{{ route('orders.create') }}" class="df-btn-primary">
            Add Order
            </a>
            </span>
        </div> --}}
        </div>
    </x-slot>
    <div class="px-4 mt-5 md:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 inline-flex items-center">
            You have successfully registered, but is not finished we are waiting for your payment. Your
            status is {{ $order->status == 'open' ? 'processing': $order->status }}
        </h2>
        <p class="text-base my-5">
            You have been registered you!
            <br>
            We are now waiting for payment.
            Please be aware that you need to pay in order to confirm your place

            Here is the procedure to follow:
        </p>

        @if ($method == 'revolut')
        <p>
            It is now possible to pay your membership fee via Revolut.

            As this is a professional Revolut, the first transfer takes a little longer than a classic Revolut transfer,
            but once you have registered our details, the next transfers will be very quick.

            Here is the procedure to follow:
        </p>
        <br>
        <h3 class="text-lg font-bold text-gray-800 capitalize">{{ $method }}</h3>
        <ol class="list-decimal ml-6">
            <li>Go to Payments then choose Bank Transfer</li>
            <li>Add a new recipient “company” (be careful not to choose a “individual” recipient. If you do not have
                this
                option, download the latest version of Revolut).</li>
            <li>Enter the account information</li>
            <li>Choose Country = UK</li>
            <li>Choose Currency = CHF</li>
            <li><strong>Beneficiary: </strong> DANCEFLOOR KOUADIO ET TE</li>
            <li><strong>IBAN:</strong> GB31 REVO 0099 6955 2569 10</li>
            <li><strong>BIC:</strong> REVOGB21</li>
            <li><strong>Address of the beneficiary:</strong> 1202, Route de Meyrin 5, Geneva, Switzerland</li>
            <li><strong>Bank/payment institution:</strong> Revolut</li>
            <li>And you can make the payment</li>
        </ol>
        <div class="my-5">
            <a href="{{ route('welcome') }}" class="df-btn-primary">
                Back to the homepage
            </a>
        </div>
        @endif

        @if ($method == 'bank-transfer' || $method == 'post')
        <h3 class="text-lg font-bold text-gray-800 capitalize">{{ $method }}</h3>
        @include('partials.payment-method.bank-transfer')
        <div class="my-5">
            <a href="{{ route('welcome') }}" class="df-btn-primary">
                Back to the homepage
            </a>
        </div>
        @endif


    </div>

</x-app-layout>