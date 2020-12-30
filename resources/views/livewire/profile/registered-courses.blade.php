<div>

    <!-- Projects list (only on smallest breakpoint) -->
    {{-- <div class="mt-10 sm:hidden">
        <div class="px-4 sm:px-6">
            <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">User</h2>
        </div>
        <ul class="mt-3 border-t border-gray-200 divide-y divide-gray-100">

            @foreach ($registered_courses as $course)
            <li>
                <a href="{{ route('courses.view', $course->slug) }}"
    class="flex items-center justify-between px-4 py-4 hover:bg-gray-50 sm:px-6">
    <div class="flex items-center truncate space-x-3">
        <x-course.display-activity-color status="{{ $course->status }}" />
        <div class="truncate text-gray-700 text-sm leading-6">
            <span class="font-bold">{{ $course->name }}</span>
            @if ($course->start_date)
            <span class="block text-sm text-gray-600 truncate">
                {{ \Carbon\Carbon::parse($course->start_date)->format('d M y') }}
                -
                {{ \Carbon\Carbon::parse($course->end_date)->format('d M y') }}
            </span>
            @endif
            @if ($course->pivot->status === 'registered')

            <button type="submit" onclick="location.href='{{ $course->online_link }}'"
                class="block text-gray-500 hover:text-gray-700 hover:underline">Group</button>

            @endif
            @if($course->pivot->status === 'pre-registered')
            <form action="{{ route('registration.remove', $course)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="block text-gray-500 hover:text-gray-700 hover:underline">Deregister</button>
            </form>
            @endif
        </div>
    </div>

    <svg class="ml-4 h-5 w-5 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
            clip-rule="evenodd" />
    </svg>
    </a>
    </li>
    @endforeach
    </ul>
</div> --}}

<!-- Projects table (small breakpoint and up) -->
<div class="mt-1">
    <div class="align-middle inline-block min-w-full border-b border-gray-200">
        <table class="min-w-full">
            <thead>
                <tr class="border-t border-gray-200">
                    <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        <span class="lg:pl-2">Course name</span>
                    </th>
                    <th
                        class="hidden xl:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Schedule
                    </th>
                    <th
                        class="hidden lg:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Type
                    </th>
                    <th
                        class="hidden md:table-cell px-6 py-3 border-b border-gray-200 text-left bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th
                        class="hidden xl:table-cell px-6 py-3 border-b border-gray-200 text-left bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider ">
                        Teachers
                    </th>
                    <th
                        class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse ($registered_courses as $course)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center" x-data="{ preview:false }">
                            <x-course.display-activity-color status="{{ $course->status }}" />
                            <div class="ml-4">
                                <a href="{{ route('courses.view', $course->slug) }}"
                                    class="text-sm leading-5 font-bold text-gray-900 hover:text-gray-800 hover:underline">
                                    {{ $course->name }} | {{ $course->level_number }}
                                </a>
                                <div class="block lg:hidden">
                                    <span class="whitespace-no-wrap text-sm leading-5 text-gray-500">
                                        {{ $course->focus }} {{ $course->type }}
                                    </span>
                                </div>
                                @if ($course->start_date)
                                <span
                                    class="block text-sm text-gray-600">{{ \Carbon\Carbon::parse($course->start_date)->format('d F y') }}
                                    -
                                    {{ \Carbon\Carbon::parse($course->end_date)->format('d F y') }}</span>
                                @endif
                                <div class="block xl:hidden">
                                    <x-shared.course-daily-schedule :course="$course" />
                                </div>
                                <div class="block md:hidden">
                                    <x-partial.registration-status :user="auth()->user()" cid="{{ $course->id }}" />
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="hidden xl:table-cell px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                        <x-shared.course-daily-schedule :course="$course" />
                    </td>
                    <td class="hidden lg:table-cell px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                        {{ $course->focus }} {{ $course->type }}
                    </td>
                    <td class="hidden md:table-cell px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                        <x-partial.registration-status :user="auth()->user()" cid="{{ $course->id }}" />
                    </td>
                    <td class="hidden xl:table-cell px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                        @if (count($course->teachers) < 3) @foreach ($course->teachers as $teacher)
                            <div class="inline-flex items-center my-2">
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
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                        @if ($course->pivot->status === 'registered')
                        <a href="{{$course->online_link}}"
                            class="bg-blue-700 px-2 py-1 rounded-full inline-flex items-center text-white"
                            target="_blank">
                            @include('icons.social.facebook', ['style'=>'w-4 h-4 mr-2'])
                            Group
                        </a>
                        @elseif($course->pivot->status === 'pre-registered')
                        <form action="{{ route('registration.remove', $course)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-gray-500 hover:text-gray-700 hover:underline text-center">Deregister</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        No registrations
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <div class="my-3 mx-4">
        {{ $registered_courses->links() }}
    </div>
</div>
</div>