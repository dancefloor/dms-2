<x-guest-layout>
    <x-slot name="seo">
        <meta property="og:url" content="{{ url('/courses/'. $course->id) }}" />
        <meta property=" og:type" content="website" />
        <meta property="og:title" content="Dancefloor Studio | {{ $course->name }}" />
        <meta property="og:description" content="{{ strip_tags($course->excerpt ) }}" />
        <meta property="og:image" content="{{ asset('uploads/'. $course->thumbnail ) }}" />
    </x-slot>


    <div x-data="{ slideOver:false, openMenu: false, SlideOverMenu: false }">
        @include('partials.navbar')
        <x-layouts.slide-over-sidebar-nav />
        <article>

            <div class="border-t border-gray-300 pt-15">
                <div class="bg-gray-800 pb-44">
                    <header class="py-10">
                        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                            <h1 class="text-4xl md:text-6xl font-bold text-white text-center">
                                {{ $course->name }}
                            </h1>
                            <h3 class="text-2xl font-bold text-gray-300 text-center">
                                {{ $course->tagline }}
                            </h3>
                            @if(now() < $course->end_date && $course->is_online == 1)
                                <div class="flex justify-center">
                                    <span
                                        class="bg-red-700 text-white text-sm px-2 uppercase rounded inline-block">Live</span>
                                </div>
                                @endif
                        </div>
                    </header>
                </div>


                <main class="-mt-44">
                    <div class="max-w-6xl mx-auto px-3">
                        <!-- Replace with your content -->
                        <div class="bg-gray-800 rounded-lg shadow overflow-auto">
                            @if ($course->teaser_video_1)
                            {!! $course->teaser_video_1 !!}
                            @else
                            <iframe width="100%" height="450" src="https://www.youtube.com/embed/Ao4kqzU2qEc"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            @endif
                        </div>
                        <!-- /End replace -->
                    </div>
                </main>
            </div>

            <div class="max-w-6xl m-auto px-3 block mb-16">
                <div class="flex flex-wrap min-h-screen -mx-3">
                    <div class="w-full md:w-2/3 px-3 pt-20">
                        @if ($course->excerpt)
                        <h3 class="font-semibold text-sm uppercase text-gray-700 block my-2">Description</h3>
                        <p class="mb-6">
                            {!! $course->excerpt !!}
                        </p>
                        @endif

                        @if ($course->description)
                        <br>
                        <h3 class="font-semibold text-sm uppercase text-gray-700 block my-2">Details</h3>
                        <p class="mb-6">
                            {!! $course->description !!}
                        </p>
                        @endif

                        @if ($course->teaser_video_2)
                        <br>
                        {!! $course->teaser_video_2 !!}
                        @endif

                        @if ($course->teaser_video_3)
                        <br>
                        {!! $course->teaser_video_3 !!}
                        @endif

                        {{-- @include('courses.fields.main.default') --}}
                        {{-- @include('courses.fields.main.extra') --}}


                        @if ($course->teachers->count() > 0)
                        <br>
                        <h3 class="font-semibold text-sm uppercase text-gray-700 block my-2">Teachers</h3>
                        <div class="flex flex-wrap items-center">
                            @forelse ($course->teachers as $teacher)
                            <div class="inline-flex mr-5 items-center">
                                <img class="w-10 h-10 rounded-full mr-4 border border-3 border-gray-400"
                                    src="{{ asset($teacher->profile_photo_url) }}" alt="{{ $teacher->firstname }}">
                                <div class="text-sm">
                                    <p class="text-gray-900 leading-none">{{ $teacher->name }} {{ $teacher->lastname }}
                                    </p>
                                </div>
                            </div>
                            @empty

                            @endforelse
                        </div>
                        <br>
                        @endif


                        @if ($course->classroom)
                        <section>
                            <br>
                            <br>
                            <h3 class="font-semibold text-sm uppercase text-gray-700 block my-2">Location</h3>
                            {{ $course->classroom->location->name }}
                            {!! $course->classroom->location->google_maps !!}
                        </section>
                        @endif

                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <div class="sticky top-0 self-start pt-20">
                            @include('courses.sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </article>
        @auth
        <x-partials.slide-over />
        @endauth
    </div>
</x-guest-layout>