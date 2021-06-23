<x-guest-layout>

    <div x-data="{ slideOver:false, openMenu: false, SlideOverMenu: false }">
        <x-layouts.slide-over-sidebar-nav />
        @include('partials.navbar')

        <section id="catalogue" class="bg-gray-100 py-16">
            <div class="container mx-auto">
                <h1 class="text-5xl font-semibold mt-8">Courses</h1>
                @auth
                <x-partials.reduced-price-notification />
                @endauth
                <livewire:catalogue.daily-schedule />
            </div>
        </section>

        @auth
        <x-partials.slide-over />
        @endauth
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