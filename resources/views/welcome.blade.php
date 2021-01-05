<x-guest-layout>
    <div x-data="{ slideOver:false, openMenu: false, SlideOverMenu: false }">
        @include('partials.navbar')
        <x-layouts.slide-over-sidebar-nav />

        <section id="landing" class="pt-16">
            @include('partials.landing-banner')
        </section>

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

</x-guest-layout>