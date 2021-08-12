<div>
    <dl>
        <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
            <dt>
                <div class="absolute bg-red-600 rounded-md p-3">
                    <svg width="16" height="16" fill="currentColor" class="h-8 w-8 text-white" viewBox="0 0 16 16">
                        <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                        <path
                            d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
                    </svg>
                </div>
                <p class="ml-20 text-sm font-medium text-gray-500 truncate">{{ $text }}</p>
            </dt>
            <dd class="ml-20 pb-6 flex items-baseline sm:pb-4">

                <p class="text-3xl font-semibold {{ $style}}">CHF {{ abs($balance) }}</p>
                <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                    <div class="text-sm flex justify-between">
                        <a href="{{ route('my-orders') }}" class="font-medium text-red-700 hover:text-red-500">
                            View orders
                        </a>
                        <a href="{{ route('payment-methods') }}" class="font-medium text-red-700 hover:text-red-500">
                            Payment methods
                        </a>
                    </div>
                </div>
            </dd>
        </div>
    </dl>
    {{-- {{ $total }}
    {{ $received }} --}}
</div>