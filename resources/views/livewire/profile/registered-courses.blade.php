<div>


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
                    @forelse ($registered_courses as $registration)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <div class="flex items-center" x-data="{ preview:false }">
                                <x-course.display-activity-color status="{{ $registration->course->status }}" />
                                <div class="ml-4">
                                    <a href="{{ route('courses.view', $registration->course->id) }}"
                                        class="text-sm leading-5 font-bold text-gray-900 hover:text-gray-800 hover:underline">
                                        {{ $registration->course->name }} | {{ $registration->course->level_number }}
                                    </a>
                                    <div class="block lg:hidden">
                                        <span class="whitespace-no-wrap text-sm leading-5 text-gray-500">
                                            {{ $registration->focus }} {{ $registration->type }}
                                        </span>
                                    </div>
                                    @if ($registration->course->start_date)
                                    <span
                                        class="block text-sm text-gray-600">{{ \Carbon\Carbon::parse($registration->course->start_date)->format('d F y') }}
                                        -
                                        {{ \Carbon\Carbon::parse($registration->course->end_date)->format('d F y') }}</span>
                                    @endif
                                    <div class="block xl:hidden">
                                        <x-shared.course-daily-schedule :course="$registration->course" />
                                    </div>
                                    <div class="block md:hidden">
                                        {{-- <x-partial.registration-status :user="auth()->user()"
                                            cid="{{ $registration->course->id }}" /> --}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="hidden xl:table-cell px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <x-shared.course-daily-schedule :course="$registration->course" />
                        </td>
                        <td class="hidden lg:table-cell px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $registration->course->focus }} {{ $registration->course->type }}
                        </td>
                        <td class="hidden md:table-cell px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{-- <x-partial.registration-status :user="auth()->user()"
                                cid="{{ $registration->course->id }}" /> --}}
                            {{ $registration->course->name }}
                            {{ $registration->course->id }}
                        </td>
                        <td class="hidden xl:table-cell px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            @if (count($registration->course->teachers) < 3) @foreach ($registration->course->teachers
                                as
                                $teacher)
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
                            @if ($registration->status === 'registered')

                            @elseif($registration->status === 'pre-registered' ||
                            $registration->status === 'standby')
                            <form action="{{ route('registration.remove', $registration->course)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-gray-500 hover:text-gray-700 hover:underline text-center">
                                    @include('icons.trash')
                                </button>
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