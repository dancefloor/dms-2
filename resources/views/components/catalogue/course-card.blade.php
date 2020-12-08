<div class="col-span-2">
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    <div
        class="@auth {{ $course->hasStudent(Auth::user()->id) ? $border : '' }} @endauth m-2 shadow-md hover:shadow-2xl rounded-lg overflow-hidden bg-white">
        {{-- <div class="p-3"> --}}
        <div class="px-3 pt-3 pb-1">
            {{-- <span class="bg-red-700 px-2 rounded-full text-red-100 text-sm float-right"> --}}
            <div class="flex justify-between items-center">
                <span class="{{ $text }} capitalize text-sm">{{ $course->focus }}</span>
                <span class="{{ $text }} text-sm font-extrabold mt-1 w-20 text-right">
                    CHF {{ $course->full_price }}
                </span>
            </div>
            <div>
                <h2 class="font-black text-xl text-gray-700">
                    {{ $course->name }}
                    <div class="w-full text-gray-600 text-sm mb-2">
                        {{ $course->tagline}}
                    </div>
                </h2>
            </div>

            {{-- <div class="inline-flex w-full text-gray-600 text-sm">
                <span>
                    @include('icons.dance', ['style' => 'w-4 text-gray-600 mr-2'])
                </span>
                @foreach ($course->styles as $item)
                {{ $item->name }}
            @endforeach
        </div> --}}
        {{-- <span class="bg-red-700 font-bold text-xs text-white px-1 rounded-md inline-block">
            LIVE
        </span> --}}
        {{-- <div class="inline-flex text-gray-600 text-sm">
            <span>
                @include('icons.calendar', ['style' => 'w-4 text-gray-600 mr-2'])
            </span>
            <span>
                {{ \Carbon\Carbon::parse( $course->start_date )->format('M d, Y') }}

        - {{ \Carbon\Carbon::parse( $course->end_date )->format('M d, Y') }}
        </span>
    </div> --}}
    <x-shared.course-daily-schedule :course="$course" />
    <div class="flex justify-between text-sm text-gray-600 mb-1">
        <span class="inline-flex items-center">@include('icons.level', ['style'=>'w-4
            mr-2']){{ $course->level }}</span>
        {{-- <span>CHF {{ $course->full_price }}</span> --}}
    </div>
    <div class="flex justify-between text-sm text-gray-600 my-1">
        <span class="inline-flex items-center">@include('icons.geo-fill', ['style'=>'w-4
            mr-2']){{ $course->classroom->name ?? '' }}</span>
        {{-- <span>CHF {{ $course->full_price }}</span> --}}
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

        @switch(auth()->user()->registrationStatus($course->id))

        @case('pre-registered')
        <div id="pending" class="bg-orange-400 px-2 py-1 rounded-full inline-flex items-center">
            @include('icons.pending',['style'=>'w-5'])
            <span class="ml-2 text-sm">Pre-registered</span>
        </div>
        @break
        @case('waiting')
        <div id="waiting" class="bg-blue-600 px-2 py-1 rounded-full inline-flex items-center">
            @include('icons.waiting',['style'=>'w-5'])
            <span class="ml-2 text-sm">Waiting list</span>
        </div>
        @break
        @case('registered')
        <div id="registered" class="bg-green-600 px-2 py-1 rounded-full inline-flex items-center">
            @include('icons.checked',['style'=>'w-5 h-5'])
            <span class="ml-2 text-sm">Registered</span>
        </div>
        @break
        @case('standby')
        <div id="standby" class="bg-pink-400 px-2 py-1 rounded-full inline-flex items-center">
            @include('icons.standby',['style'=>'w-5'])
            <span class="ml-2 text-sm">Standby</span>
        </div>
        @break
        @case('open')
        <div id="standby" class="bg-teal-300 px-2 py-1 rounded-full inline-flex items-center">
            @include('icons.open',['style'=>'w-5'])
            <span class="ml-2 text-sm">Open</span>
        </div>
        @break
        @case('partial')
        <div id="partial" class="bg-green-400 px-2 py-1 rounded-full inline-flex items-center">
            @include('icons.phase',['style'=>'w-5'])
            <span class="ml-2 text-sm">Partially registered</span>
        </div>
        @break
        @default
        <div id="cancelled" class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full inline-flex items-center">
            @include('icons.x-circle-thin',['style'=>'w-5'])
            <span class="text-sm">Cancelled</span>
        </div>
        @endswitch

        @else
        <form action="{{ route('registration.add', $course->id ) }}" method="post">
            @csrf
            <button type="submit" title="Register"
                class="w-full bg-gray-200 text-gray-700 hover:bg-red-800 hover:text-white text-sm px-2 py-1 rounded-full inline-flex items-center">
                @include('icons.add-to-basket')
                <span class="ml-2">Add to basket</span>
            </button>
        </form>
        @endif
    </div>
</div>
@endauth
</div>
</div>