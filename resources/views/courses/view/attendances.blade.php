<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
        <div class="flex justify-between items-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Attendances
            </h3>
            <a href="{{ route('attendances.create', ['course'=> $course]) }}" class="df-btn-primary">
                Add Attendance
            </a>
        </div>
    </div>
    <div class="px-4 py-5 sm:p-0">
        <div class="px-4 py-3">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    @foreach ($course->attendances as $attendance)
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <a href="{{ route('attendances.edit', $attendance) }}"
                                            class="hover:text-gray-700">
                                            {{ $attendance->date->format('M j') }}
                                        </a>
                                    </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                                @forelse ($course->students as $student)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $student->name }}
                                    </td>
                                    @foreach ($course->attendances as $a)
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                                        @switch($a->studentStatusAttendance($student->id)->status)
                                        @case('present')
                                        <span class="text-green-600">@include('icons.check-fill')</span>
                                        @break
                                        @case('absent')
                                        <span class="text-red-500">
                                            @include('icons.x-circle')
                                        </span>
                                        @break
                                        @case('excused')
                                        <span class="text-gray-400">
                                            @include('icons.dash-circle')
                                        </span>
                                        @break
                                        @default
                                        <span class="text-gray-400">
                                            -
                                        </span>
                                        @endswitch


                                    </td>
                                    @endforeach
                                </tr>

                                @empty
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        There are no attendances attached to this course
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>