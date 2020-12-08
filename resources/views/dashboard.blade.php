<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <ul class="border bg-white rounded-lg">
                    @forelse (auth()->user()->learns as $item)
                    <li
                        class="grid grid-cols-3 sm:grid-cols-5 gap-4 items-center px-3 py-2 {{ $loop->last ? '' : 'border-b border-gray-300'}}">
                        <div>
                            <strong class="block"><a
                                    href="{{ route('courses.show', $item) }}">{{ $item->name }}</a></strong>
                            @if ($item->start_date)
                            <span
                                class="text-sm text-gray-700">{{ \Carbon\Carbon::parse($item->start_date)->format('d F y') }}
                                -
                                {{ \Carbon\Carbon::parse($item->end_date)->format('d F y') }}</span>
                            @endif
                            <div class="text-xs sm:hidden capitalize">
                                {{ implode(',',$item->days)}}
                            </div>
                        </div>
                        <div class="hidden sm:inline-flex">
                            {{-- {{ implode(',',$item->days)}} --}}
                        </div>
                        <div class="hidden sm:inline-flex">
                            @if (count($item->teachers) < 3) @foreach ($item->teachers as $teacher)
                                <div class="inline-flex items-center mr-2 my-2">
                                    <img src="{{$teacher->profile_photo_url}}" alt="" class="w-8 rounded-full">
                                    <span class="truncate ml-1">{{ $teacher->firstname }}</span>
                                </div>
                                @endforeach
                                @else
                                <div class="inline-flex items-center mr-2 my-2">
                                    <img src="{{ asset('images/dancefloor-logo-black.png')}}" alt=""
                                        class="w-8 rounded-full">
                                    <span class="truncate ml-1">Dancefloor Team</span>
                                </div>
                                @endif
                                {{-- @foreach ($item->teachers as $t)
                            <img src="{{ asset($t->avatar)}}" alt="" class="w-8 h-8 rounded-full">
                                @endforeach --}}
                        </div>
                        <div class="flex justify-end">
                            <div class="inline-flex items-center">
                                {{-- <x-registration-status uid="{{ auth()->user()->id }}" cid="{{ $item->id }}" /> --}}
                            </div>
                        </div>
                        <div class="capitalize text-right">
                            @if ($item->pivot->status === 'registered')
                            <a href="{{$item->online_link}}"
                                class="my-1 w-full md:w-1/2 flex items-center justify-center px-3 py-1 border border-transparent text-xs rounded-full text-white bg-blue-700 hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition duration-150 ease-in-out md:py-1 md:text-sm md:px-3"
                                target="_blank">
                                @include('icons.social.facebook', ['style'=>'w-4 h-4 mr-2'])
                                Group
                            </a>
                            @endif
                            @if ($item->pivot->status === 'pre-registered')
                            <form action="{{ route('registration.remove', $item)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Remove</button>
                            </form>
                            @endif
                        </div>
                    </li>

                    @empty
                    <li class="py-10">
                        <dt class="text-center">You have not signed to any class yet</dt>
                        <dd class="text-center my-3">
                            <a href="/"
                                class="bg-red-700 text-white px-3 py-2 rounded-full capitalize hover:bg-red-800">Find
                                courses</a>
                        </dd>
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>