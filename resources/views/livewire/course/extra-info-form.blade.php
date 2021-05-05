<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Extra Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Complete related informations
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="updateExtraInfo" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6">
                                <label for="teachers" class="df-form-label">Teachers</label>
                                <input wire:model="teachers" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6">
                                <label for="students" class="df-form-label">Students</label>
                                <input wire:model="students" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="classroom_id"
                                    class="block text-sm font-medium leading-5 text-gray-700">Classroom</label>
                                <select wire:model="classroom_id" class="form-select df-form-select">
                                    <option>United States</option>
                                    <option>Canada</option>
                                    <option>Mexico</option>
                                </select>
                            </div>

                            <fieldset class="col-span-6">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input wire:model="to_waiting" type="checkbox"
                                            class="form-checkbox df-form-checkbox">
                                    </div>
                                    <div class="ml-3 text-sm leading-5">
                                        <label for="standby" class="font-medium text-gray-700">
                                            Standby list?
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="status" class="df-form-label">Status</label>
                                <select wire:model="status" class="form-select df-form-select">
                                    <option value="active">Active</option>
                                    <option value="finished">Finished</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>

                            <div class="col-span-6" wire:key="styles-select">
                                <label for="styles" class="df-form-label">Styles</label>

                                {{-- <x-shared.multi-select /> --}}
                                <x-partial.multi-select wire:model="styles" prettyname="styles"
                                    :options="['sugar','milk','cambur']" />
                            </div>
                            7


                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <a href="{{ route('courses.view', $course->slug) }}" class="df-btn-secondary">
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

    @push('modals')
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>

    </script>
    @endpush
</div>