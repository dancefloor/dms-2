<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 flex justify-between items-center">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Students
        </h3>
        <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
            <a href="{{ route('course-students.export', $course) }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                Export
            </a>
        </span>
    </div>
    <div class="px-4 py-5 sm:p-0">
        <dl>
            <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Total students: {{ $course->students()->count() }}
                    <br>
                    Confirmed students: {{ count($course->confirmedStudents($course->id)) }}
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    <livewire:partials.students-list :course="$course" />
                </dd>
            </div>
        </dl>
    </div>
</div>