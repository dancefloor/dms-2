<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Attendance</h3>
                <p class="mt-1 text-sm text-gray-600">
                    This information will be displayed in the course timesheet
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="save" method="POST">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
                                <select wire:model="attendance.course_id" id="course"
                                    class="form-select df-form-select">
                                    <option value="" selected>Select Course</option>
                                    @foreach (\App\Models\Course::activeCourses()->get() as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }} |
                                        {{ implode(',',$course->days)}}</option>
                                    @endforeach
                                </select>
                                @error('attendance.course_id')
                                <span class="text-red-700 text-sm">{{ $message}}</span>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-form.date-input wire:model="attendance.date" name="attendance.date" label="Date" />
                                {{-- <label for="date" class="block text-sm font-medium text-gray-700">
                                    Date
                                </label>
                                <input type="date" id="date" class="form-input df-form-input">
                                @error('attendance.date')
                                <span class="text-red-700 text-sm">{{ $message}}</span>
                                @enderror --}}
                            </div>
                        </div>

                        <div>
                            <label for="comments" class="block text-sm font-medium text-gray-700">
                                Comments
                            </label>
                            <div class="mt-1">
                                <textarea id="comments" wire:model="attendance.comments" rows="4"
                                    class="form-textarea df-form-textarea" placeholder="comment..."></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Any comment regarding the day, the lesson, the classroom, an incident, an event,
                                student issue, etc
                            </p>
                        </div>

                        <fieldset>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="cancel" wire:model="attendance.is_cancelled" type="checkbox"
                                        class="df-form-checkbox">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="cancel" class="font-medium text-gray-700">Cancel this class</label>
                                </div>
                            </div>
                        </fieldset>

                        <div class="flow-root mt-6">
                            @if (count($attendance->attendees) > 0)
                            <label for="comments" class="block text-lg font-bold text-gray-700 mb-5">
                                Attendees
                            </label>
                            <ul class="-my-5 divide-y divide-gray-200">
                                @foreach ($attendance->attendees as $student)
                                <li class="py-2 border-t border-gray-200">
                                    <livewire:attendance.student-status :attendance="$attendance" :student="$student"
                                        :key="$student->id" />
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <div>
                            @if (session()->has('updated'))
                            <span class="text-sm text-green-500">{{ session('updated')}}</span>
                            @endif
                        </div>

                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button class="df-form-btn">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>