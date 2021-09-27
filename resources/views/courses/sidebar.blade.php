<div class="rounded overflow-hidden shadow-lg">
    @if ($course->thumbnail)
    <img class="w-full" src="{{ asset('uploads/'. $course->thumbnail )}}" alt="Sunset in the mountains">
    @endif

    <div class="px-6 py-4">

        <div class="font-bold text-sm mb-2 w-full inline-flex items-center text-gray-700">
            @include('icons.dance')
            @foreach ($course->styles as $item)
            <span class="ml-2 capitalize">{{ $item->name }}</span>
            @endforeach
        </div>

        <div class="font-bold text-sm mb-2 inline-flex items-center text-gray-700">
            @include('icons.level')
            <span class="ml-2 capitalize">
                {{ $course->level }} {{ $course->level_number }}
            </span>
        </div>

        @if(now() < $course->end_date)
            <div class="font-bold text-sm mb-2 inline-flex items-center text-gray-700">
                @include('icons.calendar')
                <span class="ml-2 capitalize">
                    Period {{ Carbon\Carbon::parse($course->start_date)->format('d F Y') }} -
                    {{ Carbon\Carbon::parse($course->end_date)->format('d F Y') }}
                    -
                </span>
            </div>

            <div class="font-bold text-sm mb-2 inline-flex items-top text-gray-700">
                @include('icons.time')
                <table class="w-full ml-2">
                    <tr>
                        <td valign="top" class="pr-2">Time</td>
                        <td>
                            <table class="w-full text-sm">
                                @if ($course->monday)
                                <tr>
                                    <td>Monday</td>
                                    <td>
                                        {{ date('H:i', strtotime($course->start_time_mon)) }} -
                                        {{ date('H:i', strtotime($course->end_time_mon)) }}
                                    </td>
                                </tr>
                                @endif

                                @if ($course->tuesday)
                                <tr>
                                    <td>Tuesday</td>
                                    <td>
                                        {{ date('H:i', strtotime($course->start_time_tue)) }} -
                                        {{ date('H:i', strtotime($course->end_time_tue)) }}
                                    </td>
                                </tr>
                                @endif

                                @if ($course->wednesday)
                                <tr>
                                    <td>Wednesday</td>
                                    <td>
                                        {{ date('H:i', strtotime($course->start_time_wed)) }} -
                                        {{ date('H:i', strtotime($course->end_time_wed)) }}
                                    </td>
                                </tr>
                                @endif

                                @if ($course->thursday)
                                <tr>
                                    <td>Thursday</td>
                                    <td>
                                        {{ date('H:i', strtotime($course->start_time_thu)) }} -
                                        {{ date('H:i', strtotime($course->end_time_thu)) }}
                                    </td>
                                </tr>
                                @endif

                                @if ($course->friday)
                                <tr>
                                    <td>Friday</td>
                                    <td>
                                        {{ date('H:i', strtotime($course->start_time_fri)) }} -
                                        {{ date('H:i', strtotime($course->end_time_fri)) }}
                                    </td>
                                </tr>
                                @endif

                                @if ($course->saturday)
                                <tr>
                                    <td>Saturday</td>
                                    <td>
                                        {{ date('H:i', strtotime($course->start_time_sat)) }} -
                                        {{ date('H:i', strtotime($course->end_time_sat)) }}
                                    </td>
                                </tr>
                                @endif

                                @if ($course->sunday)
                                <tr>
                                    <td>Sunday</td>
                                    <td>
                                        {{ date('H:i', strtotime($course->start_time_sun)) }} -
                                        {{ date('H:i', strtotime($course->end_time_sun)) }}
                                    </td>
                                </tr>
                                @endif
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            @endif

            <div class="font-bold mb-2 text-gray-700">
                <div class="inline-flex items-top">
                    @include('icons.price-tag')
                    <table class="w-full ml-2">
                        <tr>
                            <td valign="top" class="pr-2">Price</td>
                            <td>
                                <table class="w-full text-sm">
                                    <tr>
                                        <td>Full Price</td>
                                        <td>{{ $course->full_price }} EUR</td>
                                    </tr>
                                    @if ($course->reduced_price)
                                    <tr>
                                        <td>Reduced price</td>
                                        <td>{{ $course->reduced_price }} EUR</td>
                                    </tr>
                                    @endif

                                    @if ($course->promo_price)
                                    <tr>
                                        <td>Promotion</td>
                                        <td>{{ $course->promo_price }} EUR</td>
                                    </tr>
                                    @endif

                                    {{-- @if ($course->online_price)
                                    <tr>
                                        <td>Online price</td>
                                        <td>{{ $course->online_price }} CHF
                            </td>
                        </tr>
                        @endif --}}
                    </table>
                    </td>
                    </tr>
                    </table>
                </div>
            </div>
            <br>
            @auth
            @if (!auth()->user()->isRegistered($course->id))
            {{-- <form action="{{ route('registration.add', $course->id) }}" method="post">
            @csrf
            <button type="submit" id="register" title="Register"
                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition duration-150 ease-in-out md:py-2 md:text-lg md:px-10">
                Register Course 160 CHF
            </button>
            </form> --}}
            {{-- <br> --}}
            <form action="{{ route('registration.add', $course->id) }}" method="post">
                @csrf
                <button type="submit" id="register" title="Register"
                    class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition duration-150 ease-in-out md:py-2 md:text-lg md:px-10">
                    Register {{ $course->online_price }} EUR
                </button>
            </form>
            @else
            @php $user_status = auth()->user()->registrationStatus($course->id) @endphp
            @if ($user_status == 'pre-registered')
            <a href="{{ route('dashboard') }}"
                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition duration-150 ease-in-out md:py-2 md:text-lg md:px-10">
                Go to Dashboard
            </a>
            @endif
            @if ($user_status == 'registered')
            <a href="{{ $course->online_link }}"
                class="w-full my-1 flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-700 hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition duration-150 ease-in-out md:py-2 md:text-lg md:px-10">
                Facebook Group
            </a>
            @endif
            <div class="flex justify-center my-3">
                {{-- <x-registration-status uid="{{ auth()->user()->id }}" cid="{{ $course->id }}" /> --}}
            </div>

            @endif
            @else
            <a href="{{ route('register') }}"
                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                Sign-in to register
            </a>
            @endauth
    </div>
</div>