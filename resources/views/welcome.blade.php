<x-guest-layout>
    <x-slot name="head">
        <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css"
            href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    </x-slot>

    <div x-data="{ slideOver:false, openMenu: false, SlideOverMenu: false }" x-cloak>
        @include('partials.navbar')

        <x-layouts.slide-over-sidebar-nav />

        <x-welcome.landing-slider />

        {{-- <section id="landing" class="pt-16">
            @include('partials.landing-banner')
        </section> --}}

        @include('partials.landing')

        @include('partials.banner-beginner')

        {{-- <x-welcome.video-slider /> --}}

        @include('partials.banner-locations')

        @include('partials.banner-advanced')

        @include('partials.banner-dna')

        @include('partials.banner-online')

        <section>
            @include('partials.testimonials')
        </section>
        {{-- 
        <section id="catalogue" class="bg-gray-100">
            <div class="container mx-auto">
                <livewire:catalogue.schedule />
            </div>
        </section> --}}

        <section class="flex justify-center bg-white px-3">
            <x-welcome.faq />
        </section>

        @auth
        <x-partials.slide-over />
        @endauth
    </div>

    {{-- <section id="about" class="container mx-auto my-20">
        @include('partials.about')
        <br>
    </section> --}}
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

        $('#slick-video').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            adaptiveHeight: true,
            responsive:[              
                {
                    breakpoint: 1280,
                    settings: {
                      slidesToShow: 4,                      
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                      slidesToShow: 3,                      
                    }
                },
                {
                    breakpoint:  768,
                    settings: {
                        slidesToShow: 2,                        
                    }
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
        
        $('#slick-video-2').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            adaptiveHeight: true,
            responsive:[              
                {
                    breakpoint: 1280,
                    settings: {
                      slidesToShow: 4,                      
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                      slidesToShow: 3,                      
                    }
                },
                {
                    breakpoint:  768,
                    settings: {
                        slidesToShow: 2,                        
                    }
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });

        $('#slick-video-3').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            adaptiveHeight: true,
            responsive:[              
                {
                    breakpoint: 1280,
                    settings: {
                      slidesToShow: 4,                      
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                      slidesToShow: 3,                      
                    }
                },
                {
                    breakpoint:  768,
                    settings: {
                        slidesToShow: 2,                        
                    }
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    </script>
    @endpush

</x-guest-layout>