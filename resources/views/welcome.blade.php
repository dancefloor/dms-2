<x-guest-layout>
    <x-slot name="head">
        <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css"
            href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    </x-slot>

    <div x-data="{ slideOver:false, openMenu: false, SlideOverMenu: false }">
        @include('partials.navbar')

        <x-layouts.slide-over-sidebar-nav />

        <x-welcome.landing-slider />

        {{-- <section id="landing" class="pt-16">
            @include('partials.landing-banner')
        </section> --}}

        @include('partials.landing')

        <section>
            @include('partials.testimonials')
        </section>

        <section id="catalogue" class="bg-gray-100">
            <div class="container mx-auto">
                <livewire:catalogue.schedule />
            </div>
        </section>
        @auth
        <x-partials.slide-over />
        @endauth
    </div>

    <section id="about" class="container mx-auto my-20">
        @include('partials.about')
        <br>
    </section>
    @push('scripts')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('#slick').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            adaptiveHeight: true,
        });
    </script>
    @endpush

</x-guest-layout>