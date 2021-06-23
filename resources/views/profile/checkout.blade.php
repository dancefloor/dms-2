<x-guest-layout>
    <div x-data="{ showMobileSidebar: false, slideOver:false, openMenu: false, SlideOverMenu: false}">
        <x-layouts.slide-over-sidebar-nav />
        @include('partials.navbar')

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="pt-12">
                <h2 id="slide-over-heading" class="text-2xl font-bold text-gray-900 inline-flex items-center mb-5">
                    @include('icons.checkout-cart', ['style'=>'h-7 w-7'])
                    <span class="ml-2">Checkout</span>
                </h2>
                <livewire:partials.checkout />
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