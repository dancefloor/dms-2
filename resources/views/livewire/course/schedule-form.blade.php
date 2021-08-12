<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Schedule Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Please select the dates and time schedule
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="updateSchedule" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">

                        <x-shared.alert />

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-2">

                                <x-form.date-input name="start_date" label="Start Date" />
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <x-form.date-input name="end_date" label="End Date" />
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="duration" class="df-form-label">Duration</label>
                                <input wire:model="duration" class="df-form-input" type="time"
                                    placeholder="ex: 18:30 or 09:15">
                                <p class="text-sm text-gray-500">format: HH:MM</p>
                                @error('duration')
                                {{ $message }}
                                @enderror
                            </div>

                            <div class="col-span-6 mb-4">
                                <legend class="text-base leading-6 font-medium text-gray-900">Time schedule</legend>
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 items-center">
                            <div class="col-span-6 sm:col-span-2">
                                <div class="flex items-center">
                                    <div class="flex items-center h-5">
                                        <input wire:model="monday" type="checkbox"
                                            class="form-checkbox df-form-checkbox">
                                    </div>
                                    <div class="ml-3 text-sm leading-5">
                                        <label for="monday" class="font-medium text-gray-700">Monday</label>
                                    </div>
                                </div>
                            </div>

                            @if ($monday)
                            <div class="col-span-6 sm:col-span-2">
                                <label for="start_time_mon" class="df-form-label">Start time</label>
                                <input wire:model="start_time_mon" class="df-form-input" type="time">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="end_time_mon" class="df-form-label">End time</label>
                                <input wire:model="end_time_mon" class="df-form-input" type="time">
                            </div>
                            @endif
                        </div>

                        <div class="grid grid-cols-6 gap-6 items-center mt-4">
                            <div class="col-span-6 sm:col-span-2">
                                <div class="flex items-center">
                                    <div class="flex items-center h-5">
                                        <input wire:model="tuesday" type="checkbox"
                                            class="form-checkbox df-form-checkbox">
                                    </div>
                                    <div class="ml-3 text-sm leading-5">
                                        <label for="tuesday" class="font-medium text-gray-700">Tuesday</label>
                                    </div>
                                </div>
                            </div>
                            @if ($tuesday)
                            <div class="col-span-6 sm:col-span-2">
                                <label for="start_time_tue" class="df-form-label">Start time</label>
                                <input wire:model="start_time_tue" class="df-form-input" type="time">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="end_time_tue" class="df-form-label">End time</label>
                                <input wire:model="end_time_tue" class="df-form-input" type="time">
                            </div>
                            @endif
                        </div>


                        <div class="grid grid-cols-6 gap-6 items-center mt-4">
                            <div class="col-span-6 sm:col-span-2">
                                <div class="flex items-center">
                                    <div class="flex items-center h-5">
                                        <input wire:model="wednesday" type="checkbox"
                                            class="form-checkbox df-form-checkbox">
                                    </div>
                                    <div class="ml-3 text-sm leading-5">
                                        <label for="wednesday" class="font-medium text-gray-700">Wednesday</label>
                                    </div>
                                </div>
                            </div>

                            @if ($wednesday)
                            <div class="col-span-6 sm:col-span-2">
                                <label for="start_time_wed" class="df-form-label">Start time</label>
                                <input wire:model="start_time_wed" class="df-form-input" type="time">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="end_time_wed" class="df-form-label">End time</label>
                                <input wire:model="end_time_wed" class="df-form-input" type="time">
                            </div>
                            @endif
                        </div>


                        <div class="grid grid-cols-6 gap-6 items-center mt-4">
                            <div class="col-span-6 sm:col-span-2">
                                <div class="flex items-center">
                                    <div class="flex items-center h-5">
                                        <input wire:model="thursday" type="checkbox"
                                            class="form-checkbox df-form-checkbox">
                                    </div>
                                    <div class="ml-3 text-sm leading-5">
                                        <label for="thursday" class="font-medium text-gray-700">Thursday</label>
                                    </div>
                                </div>
                            </div>

                            @if ($thursday)
                            <div class="col-span-6 sm:col-span-2">
                                <label for="start_time_thu" class="df-form-label">Start time</label>
                                <input wire:model="start_time_thu" class="df-form-input" type="time">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="end_time_thu" class="df-form-label">End time</label>
                                <input wire:model="end_time_thu" class="df-form-input" type="time">
                            </div>
                            @endif
                        </div>


                        <div class="grid grid-cols-6 gap-6 items-center mt-4">
                            <div class="col-span-6 sm:col-span-2">
                                <div class="flex items-center">
                                    <div class="flex items-center h-5">
                                        <input wire:model="friday" type="checkbox"
                                            class="form-checkbox df-form-checkbox">
                                    </div>
                                    <div class="ml-3 text-sm leading-5">
                                        <label for="friday" class="font-medium text-gray-700">Friday</label>
                                    </div>
                                </div>
                            </div>

                            @if ($friday)
                            <div class="col-span-6 sm:col-span-2">
                                <label for="start_time_fri" class="df-form-label">Start time</label>
                                <input wire:model="start_time_fri" class="df-form-input" type="time">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="end_time_fri" class="df-form-label">End time</label>
                                <input wire:model="end_time_fri" class="df-form-input" type="time">
                            </div>
                            @endif
                        </div>


                        <div class="grid grid-cols-6 gap-6 items-center mt-4">
                            <div class="col-span-6 sm:col-span-2">
                                <div class="flex items-center">
                                    <div class="flex items-center h-5">
                                        <input wire:model="saturday" type="checkbox"
                                            class="form-checkbox df-form-checkbox">
                                    </div>
                                    <div class="ml-3 text-sm leading-5">
                                        <label for="saturday" class="font-medium text-gray-700">Saturday</label>
                                    </div>
                                </div>
                            </div>
                            @if ($saturday)
                            <div class="col-span-6 sm:col-span-2">
                                <label for="start_time_sat" class="df-form-label">Start time</label>
                                <input wire:model="start_time_sat" class="df-form-input" type="time">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="end_time_sat" class="df-form-label">End time</label>
                                <input wire:model="end_time_sat" class="df-form-input" type="time">
                            </div>
                            @endif
                        </div>


                        <div class="grid grid-cols-6 gap-6 items-center mt-4">
                            <div class="col-span-6 sm:col-span-2">
                                <div class="flex items-center">
                                    <div class="flex items-center h-5">
                                        <input wire:model="sunday" type="checkbox"
                                            class="form-checkbox df-form-checkbox">
                                    </div>
                                    <div class="ml-3 text-sm leading-5">
                                        <label for="sunday" class="font-medium text-gray-700">Sunday</label>
                                    </div>
                                </div>
                            </div>

                            @if ($sunday)
                            <div class="col-span-3 sm:col-span-2">
                                <label for="start_time_sun" class="df-form-label">Start time</label>
                                <input wire:model="start_time_sun" class="df-form-input" type="time">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="end_time_sun" class="df-form-label">End time</label>
                                <input wire:model="end_time_sun" class="df-form-input" type="time">
                            </div>
                            @endif
                        </div>

                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <a href="{{ route('courses.view', $course) }}" class="df-btn-secondary">
                            View
                        </a>
                        <button class="df-form-btn">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>