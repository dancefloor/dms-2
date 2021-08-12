<x-guest-layout>

    <div x-data="{ slideOver:false, openMenu: false, SlideOverMenu: false }">
        <x-layouts.slide-over-sidebar-nav />
        @include('partials.navbar')

        <section id="catalogue" class="bg-gray-100 py-16">
            <div class="container mx-auto">
                <h1 class="text-5xl font-semibold mt-8">Workshops & Bootcamps</h1>
                <br>
                <div class="grid grid-cols-4 gap-5">
                    @forelse ($courses as $course)
                    <div class="grid-span-4 border py-2 px-3 rounded-md">
                        <a href="{{ route('courses.view', $course) }}">
                            <img src="{{ $course->thumbnail }}" alt="">
                            <h2>{{ $course->name }}</h2>
                        </a>
                    </div>
                    @empty
                    <div>
                        Now worshops found at the moment
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        @auth
        <x-partials.slide-over />
        @endauth
    </div>


</x-guest-layout>