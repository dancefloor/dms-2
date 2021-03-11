<x-guest-layout>

    <div x-data="{ slideOver:false, openMenu: false, SlideOverMenu: false }">
        @include('partials.navbar')

        <section id="catalogue" class="bg-gray-100 py-16">
            <div class="container mx-auto">
                <h1 class="text-5xl font-semibold mt-8">Geneva</h1>
                <livewire:catalogue.daily-schedule />
            </div>
        </section>
    </div>

</x-guest-layout>