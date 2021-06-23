<x-guest-layout>
    <div x-data="{ showMobileSidebar: false, slideOver:false, openMenu: false, SlideOverMenu: false}">
        <x-layouts.slide-over-sidebar-nav />
        @include('partials.navbar')
        {{-- <x-slot name="header">
            <div
                class="bg-white border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                <div class="flex-1 min-w-0">
                    <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate inline-flex">
                        @include('icons.checkout')
                        {{ __('Checkout') }}
        </h1>
    </div>
    <div class="mt-4 flex sm:mt-0 sm:ml-4">
        <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
            <a href=""
                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                Courses
            </a>
        </span>
        @if (auth()->user()->pendingCourses()->count() > 0)
        <span class="order-0 sm:order-1 sm:ml-3 shadow-sm rounded-md">
            <a href="{{ route('dashboard') }}" class="df-btn-primary">
                @include('icons.basket')
                <span class="ml-2">Checkout</span>
            </a>
        </span>
        @endif
    </div>
    </div>
    </x-slot> --}}
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="pt-12">
            <h2 id="slide-over-heading" class="text-2xl font-bold text-gray-900 inline-flex items-center mb-5">
                @include('icons.checkout-cart', ['style'=>'h-7 w-7'])
                <span class="ml-2">Cart</span>
            </h2>
            <livewire:partials.cart />
        </div>
    </div>
    </div>

    @push('scripts')
    {{-- https://stackoverflow.com/questions/43043113/how-to-force-reloading-a-page-when-using-browser-back-button --}}
    <script>
        window.addEventListener( "pageshow", function ( event ) {
            var historyTraversal = event.persisted || 
                         ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
        
            if ( historyTraversal ) {
                window.location.reload();
            }
        });
    </script>
    @endpush

</x-guest-layout>