<div class="col-span-2">
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    <div
        class="@auth {{ $course->hasStudent(Auth::user()->id) ? $border : '' }} @endauth m-2 shadow hover:shadow-2xl rounded-lg overflow-hidden bg-white">
        {{-- <div class="p-3"> --}}
        <div class="px-3 pt-3 pb-1">
            {{-- <span class="bg-red-700 px-2 rounded-full text-red-100 text-sm float-right"> --}}
            <div class="flex justify-between items-start">
                <div class="w-56">
                    <h2 class="font-semibold text-lg uppercase text-gray-700">
                        {{ $course->name }}</h2>
                    @foreach ($course->styles as $item)
                    <span class="bg-red-700 text-red-100 text-xs uppercase px-2 rounded-full mb-3 inline-block">
                        {{ $item->name }}
                    </span>
                    @endforeach
                </div>
                <span class="text-red-700 text-sm font-bold mt-1 w-16 text-right">
                    CHF {{ $course->full_price }}
                </span>
            </div>
            <div class="inline-flex text-gray-600 text-sm">
                <span>
                    @include('icons.calendar', ['style' => 'w-4 text-gray-600 mr-2'])
                </span>
                <span>
                    {{ $course->start_date->format('d.m.yy') }} - {{ $course->end_date->format('d.m.yy')}}
                </span>

            </div>
            <x-course-daily-schedule :course="$course" />
            <div class="flex justify-between text-sm text-gray-600">
                <span class="inline-flex items-center">@include('icons.level', ['style'=>'w-4
                    mr-2']){{ $course->level }}</span>
                {{-- <span>CHF {{ $course->full_price }}</span> --}}
            </div>
            @if (count($course->teachers) < 3) @foreach ($course->teachers as $teacher)
                <div class="inline-flex items-center mr-2 my-2">
                    <img src="{{$teacher->avatar}}" alt="" class="w-8 rounded-full">
                    <span class="truncate ml-1">{{ $teacher->firstname }}</span>
                </div>
                @endforeach
                @else
                <div class="inline-flex items-center mr-2 my-2">
                    <img src="{{ asset('images/dancefloor-logo-black.png')}}" alt="" class="w-8 rounded-full">
                    <span class="truncate ml-1">Dancefloor Team</span>
                </div>
                @endif

        </div>
        @auth
        <div class="flex justify-between mb-3 mx-3 items-center">
            <span class="text-xs text-gray-600">
                {{-- 10 places left --}}

            </span>
            <div class="">
                @if ($course->hasStudent(Auth::user()->id))

                @switch(auth()->user()->registrationStatus($course->id))

                @case('pre-registered')
                <span id="pending" class="bg-orange-600 text-orange-100 p-2 rounded-full inline-flex h-8 w-8">
                    @include('icons.pending',['style'=>'w-5'])
                </span>
                @break
                @case('waiting')
                <span id="waiting" class="bg-blue-600 text-blue-100 p-2 rounded-full inline-flex h-8 w-8">
                    @include('icons.waiting',['style'=>'w-5'])
                </span>
                @break
                @case('registered')
                <span id="registered" class="bg-gray-200 text-green-700 p-2 rounded-full inline-flex h-8 w-8">
                    @include('icons.checked',['style'=>'w-5'])
                </span>
                @break
                @case('standby')
                <button id="standby" disabled="disabled" class="bg-gray-200 text-pink-400 p-2 rounded-full h-8 w-8">
                    @include('icons.standby',['style'=>'w-5'])
                </button>
                @break
                @case('open')
                <button id="standby" disabled="disabled" class="bg-green-200 text-green-700 p-2 rounded-full h-8 w-8">
                    @include('icons.open',['style'=>'w-5'])
                </button>
                @break
                @case('partial')
                <button id="standby" disabled="disabled" class="bg-green-400 text-green-800 p-2 rounded-full h-8 w-8">
                    @include('icons.phase',['style'=>'w-5'])
                </button>
                @break
                @default
                <button id="cancelled" disabled="disabled" class="bg-gray-200 text-gray-800 p-2 rounded-full h-8 w-8">
                    @include('icons.x-circle-thin',['style'=>'w-5'])
                </button>
                @endswitch

                @else
                <form action="{{ route('registration.add', $course->id ) }}" method="post">
                    @csrf
                    <button id="register" type="submit" title="Register"
                        class="bg-gray-200 text-gray-700 hover:bg-red-800 hover:text-white p-2 rounded-full inline-flex items-center">
                        @include('icons.cross', ['style' => 'w-3'])
                        {{-- Register --}}
                    </button>
                </form>
                @endif
            </div>

        </div>
        @endauth
    </div>
</div>