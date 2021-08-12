<div>

    <!-- Projects list (only on smallest breakpoint) -->
    <div class="mt-10 sm:hidden">
        <div class="px-4 sm:px-6">
            <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Attendance</h2>
        </div>
        <ul class="mt-3 border-t border-gray-200 divide-y divide-gray-100">
            @foreach ($attendances as $attendance)
            <li>
                <a href="{{ route('courses.show', $attendance) }}"
                    class="flex items-center justify-between px-4 py-4 hover:bg-gray-50 sm:px-6">
                    <div class="flex items-center truncate space-x-3">
                        <div class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-pink-600"></div>
                        <p class="font-medium truncate text-sm leading-6">
                            {{ $attendance->name }} {{ $attendance->lastname }}
                            <span class="truncate font-normal text-gray-500">{{ $attendance->email }}</span>
                        </p>
                    </div>
                    <!-- Heroicon name: chevron-right -->

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
    </div>

    <!-- Projects table (small breakpoint and up) -->
    <div class="hidden mt-8 sm:block">
        <div class="align-middle inline-block min-w-full border-b border-gray-200">
            <table class="min-w-full">
                <thead>
                    <tr class="border-t border-gray-200">
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span class="lg:pl-2">Course name</span>
                        </th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Day
                        </th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Teacher(s)
                        </th>
                        <th
                            class="hidden md:table-cell px-6 py-3 border-b border-gray-200 text-left bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            was cancelled?
                        </th>
                        <th
                            class="hidden md:table-cell px-6 py-3 border-b border-gray-200 text-left bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Nb Students
                        </th>
                        <th
                            class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($attendances as $attendance)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-2 whitespace-no-wrap">
                            <a href="{{ route('attendances.edit', $attendance) }}"
                                class="font-semibold hover:text-gray-700">
                                {{ $attendance->course->name }}
                            </a>
                        </td>
                        <td class="px-6 py-2 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $attendance->date }}
                        </td>
                        <td class="px-6 py-2 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ implode(',',$attendance->course->days) }}
                        </td>
                        <td class="px-6 py-2 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            @foreach ($attendance->course->teachers as $t)
                            <span class="mr-1">{{ $t->name }}</span>
                            @endforeach
                        </td>
                        <td class="px-6 py-2 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $attendance->is_cancelled == 1 ? 'yes': 'no' }}
                        </td>
                        <td class="px-6 py-2 whitespace-no-wrap text-sm leading-5 text-gray-500">

                        </td>
                        <td class="px-6 py-2 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                            <a href="{{ route('attendances.edit', $attendance) }}"
                                class="text-red-500 hover:underline">edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="my-3 mx-4">
            {{ $attendances->links() }}
        </div>
    </div>
</div>