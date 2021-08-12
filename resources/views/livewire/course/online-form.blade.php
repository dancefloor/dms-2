<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Online Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Please enter information for live and online courses
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="updateOnline" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">

                        <x-shared.alert />

                        <div class="grid grid-cols-6 gap-6">
                            <fieldset class="col-span-6">
                                <div class="mt-4">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input wire:model="is_online" type="checkbox"
                                                class="form-checkbox df-form-checkbox">
                                        </div>
                                        <div class="ml-3 text-sm leading-5">
                                            <label for="is_online" class="font-medium text-gray-700">Is online ?</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            @if ($is_online)
                            <div class="col-span-6 sm:col-span-6">
                                <label for="online_description" class="df-form-label">Online Description</label>
                                <textarea wire:model="online_description" class="form-textarea df-form-textarea"
                                    rows="2"></textarea>
                                <p class="mt-2 text-sm text-gray-500">
                                    Brief description for this online course.
                                </p>
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                <label for="live_description" class="df-form-label">Live Description</label>
                                <textarea wire:model="live_description" class="form-textarea df-form-textarea"
                                    rows="2"></textarea>
                                <p class="mt-2 text-sm text-gray-500">
                                    Brief description to be display only while is a live course.
                                </p>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="online_link" class="df-form-label">Online URL</label>
                                <input wire:model="online_link" class="df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="online_price" class="df-form-label">Online price</label>
                                <input wire:model="online_price" class="df-form-input" type="number" step=".01">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="live_price" class="df-form-label">Live price</label>
                                <input wire:model="live_price" class="df-form-input" type="number" step=".01">
                                <p class="mt-2 text-sm text-gray-500">
                                    This price will be used only during the time live period.
                                </p>
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