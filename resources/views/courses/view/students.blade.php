<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Students
        </h3>
    </div>
    <div class="px-4 py-5 sm:p-0">
        <dl>
            <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Confirmed students: {{ $course->confirmedStudents->count() }}
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    <livewire:partials.students-list :course="$course" />
                </dd>
            </div>
        </dl>
    </div>
</div>