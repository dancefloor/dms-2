<div>

    <!-- Projects list (only on smallest breakpoint) -->
    <div class="mt-10 sm:hidden">
        <div class="px-4 sm:px-6">
            <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">User</h2>
        </div>
        <ul class="mt-3 border-t border-gray-200 divide-y divide-gray-100">
            @foreach ($courses as $course)
            <li>
                <a href="{{ route('courses.show', $course) }}"
                    class="flex items-center justify-between px-4 py-4 hover:bg-gray-50 sm:px-6">
                    <div class="flex items-center truncate space-x-3">
                        <div class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-pink-600"></div>
                        <p class="font-medium truncate text-sm leading-6">
                            {{ $course->name }} {{ $course->lastname }}
                            <span class="truncate font-normal text-gray-500">{{ $course->email }}</span>
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
                            Level
                        </th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Type
                        </th>
                        <th
                            class="hidden md:table-cell px-6 py-3 border-b border-gray-200 text-left bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Focus
                        </th>
                        <th
                            class="hidden md:table-cell px-6 py-3 border-b border-gray-200 text-left bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Last updated
                        </th>
                        <th
                            class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($courses as $course)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <div class="flex items-center" x-data="{ preview:false }">
                                <x-course.display-activity-color status="{{ $course->status }}" />
                                <div class="ml-4">
                                    <a href="{{ route('courses.show', $course) }}"
                                        class="text-sm leading-5 font-medium text-gray-900 hover:text-gray-800 hover:underline">
                                        {{ $course->name }}
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $course->level }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $course->type }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $course->focus }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $course->updated_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                            <x-shared.list-actions route="courses" :item="$course" />
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="my-3 mx-4">
            {{ $courses->links() }}
        </div>
    </div>
</div>