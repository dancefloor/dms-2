<div class="col-span-4 sm:col-span-2">

    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    <div
        class="@auth {{ $course->hasStudent(Auth::user()->id) ? $border : '' }} @endauth m-2 shadow-md hover:shadow-2xl rounded-lg overflow-hidden bg-white">
        {{-- <div class="p-3"> --}}
        <div class="px-3 pt-3 pb-1">
            {{-- <span class="bg-red-700 px-2 rounded-full text-red-100 text-sm float-right"> --}}
            <div class="flex justify-between items-top">
                <span class="font-black text-xl text-gray-700">{{ $course->name }}</span>
                <span class="{{ $text }} text-sm font-extrabold mt-1 w-20 text-right">
                    CHF {{ $course->full_price }}
                </span>
            </div>
            <div>
                <h4 class="w-full text-gray-600 text-sm mb-2">
                    {{ $course->tagline}}
                </h4>
            </div>

            <x-shared.course-daily-schedule :course="$course" day="0" />

            <div class="flex justify-between text-sm text-gray-600 mb-1">
                <span class="inline-flex items-center">
                    <x-partials.level-icon level="{{ $course->level }}" />
                    {{ $course->level }}</span>
            </div>
            <div class="flex justify-between text-sm text-gray-600 my-1">
                <span class="inline-flex items-center">@include('icons.geo-fill', ['style'=>'w-4
                    mr-2'])
                    {{ $course->neighbourhood ?? '' }}
                </span>
            </div>

            @if (count($course->teachers) > 0)
            <div>
                @if ($course->teachers->count() < 3) <section>
                    </section>
                    @foreach ($course->teachers as $teacher)
                    <div class="inline-flex items-center mr-2 my-2">
                        <img src="{{$teacher->profile_photo_url}}" alt="" class="w-8 rounded-full">
                        <span class="truncate ml-1 text-sm text-600">{{ $teacher->name }}</span>
                    </div>
                    @endforeach
                    @else
                    <div class="inline-flex items-center mr-2 my-2">
                        <img src="{{ asset('images/dancefloor-logo-black.png')}}" alt="" class="w-8 rounded-full">
                        <span class="truncate ml-1">Dancefloor Team</span>
                    </div>
                    @endif
            </div>
            @endif
        </div>

        @auth
        <div class="mb-3 mx-3 items-center">
            <div class="flex items-center text-gray-100">
                @if ($course->hasStudent(Auth::user()->id))

                <x-partial.registration-status :user="auth()->user()" cid="{{ $course->id }}" />

                @else
                <form action="{{ route('registration.add', $course->id ) }}" method="post">
                    @csrf
                    <button type="submit" title="Register"
                        class="w-full bg-gray-200 text-gray-700 hover:bg-red-800 hover:text-white text-sm px-2 py-1 rounded-full inline-flex items-center">
                        @include('icons.add-to-basket')
                        <span class="ml-2">Add to basket</span>
                    </button>
                    <input type="hidden" name="option" value="full-price">
                </form>
                @endif
            </div>
        </div>
        @endauth
    </div>
</div>