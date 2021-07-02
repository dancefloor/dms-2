<div class="{{ $border }} m-2 shadow-md hover:shadow-2xl rounded-lg overflow-hidden">
    <a href="{{ route('courses.view', $course ) }}" wire:key="$loop->index">

        <div class="px-3 pt-3 pb-1">

            <div class="flex justify-between">
                <h2 class="font-black text-lg text-gray-700">
                    {{ $course->name }}
                </h2>
                {{-- <span class="{{ $text }} capitalize text-sm">{{ $course->focus }}</span> --}}
                <span class="{{ $text }} text-sm font-extrabold mt-1 w-20 text-right">
                    {{-- <x-catalogue.display-price :course="$course" /> --}}
                    CHF {{ $course->full_price }}
                </span>
            </div>

            <div class="w-full text-gray-600 text-sm mb-2">
                {{ $course->tagline}}
            </div>

            {{-- @if ($style)
        <x-catalogue.display-style :course="$course" />
        @endif --}}

            {{-- @if ($period)
        <x-catalogue.display-period :course="$course" />
        @endif --}}

            <x-shared.course-daily-schedule :course="$course" day="0" />

            <div class="flex justify-between text-sm text-gray-600 mb-1">
                <span class="inline-flex items-center">
                    <x-partials.level-icon level="{{ $course->level }}" />
                    {{ $course->level }}</span>
                {{-- <span>CHF {{ $course->full_price }}</span> --}}
            </div>

            <div class="flex justify-between text-sm text-{{ $course->classroom->color ?? '' }}">
                <span class="inline-flex items-center">
                    @include('icons.geo-fill', ['style'=>'w-4 mr-2'])
                    <span class="text-gray-600">{{ $course->neighbourhood ?? '' }}</span>
                </span>
                {{-- {{ $course->classroom->name ?? '' }} --}}
                {{-- <span>CHF {{ $course->full_price }}</span> --}}
            </div>
            {{-- <div class="inline-flex items-center text-sm text-gray-600 my-1"> --}}
            {{-- @include('icons.timer',['style'=>'w-4 mr-2']) --}}
            {{-- <span>Total time {{ date('H:i', strtotime($course->duration)) }} </span> --}}
            {{-- </div> --}}
            <x-catalogue.display-teachers :course="$course" />
        </div>

        @auth
        <div class="mb-3 mx-3 items-center">
            <div class="flex justify-between items-center text-gray-100">

                @if ($course->hasStudent(Auth::user()->id))
                <div>
                    <x-partial.registration-status :user="auth()->user()" cid="{{ $course->id }}" />
                </div>
                <div>
                    <form wire:submit.prevent="deregister({{$course}})">
                        <button type="submit" class="text-gray-500 hover:text-red-700 pt-2 pr-1">
                            @include('icons.x-circle-thin')
                        </button>
                    </form>

                </div>
                @else
                <form wire:submit.prevent="register({{ $course }})" method="post">
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
    </a>
</div>