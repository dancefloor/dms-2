<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Default Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Default information about the course
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="{{ $action == 'create' ? 'createCourse': 'updateCourse'}}" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">

                        @if (session()->has('success'))
                        <x-partials.flash-message type="alert" />
                        @endif

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="name" class="df-form-label">Name</label>
                                <input wire:model="name" class="df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="slug" class="df-form-label">Slug</label>
                                <input wire:model="slug" class="df-form-input bg-gray-100" disabled>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="tagline" class="df-form-label">Tagline</label>
                                <input wire:model="tagline" class="df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="keywords" class="df-form-label">Keywords</label>
                                <input wire:model="keywords" class="df-form-input">
                                <p class="mt-2 text-sm text-gray-500">
                                    Please separate keywords with commas.
                                </p>
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                <label for="excerpt" class="df-form-label">Excerpt</label>
                                <textarea wire:model="excerpt" class="form-textarea df-form-textarea"
                                    rows="2"></textarea>
                                <p class="mt-2 text-sm text-gray-500">
                                    Brief description for the course.
                                </p>
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                <label for="description" class="df-form-label">Description</label>
                                <textarea wire:model="description" class="form-textarea df-form-textarea"
                                    rows="4"></textarea>
                                <p class="mt-2 text-sm text-gray-500">
                                    Full description of the course.
                                </p>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="level" class="df-form-label">Level</label>
                                <select wire:model="level" class="form-select df-form-select">
                                    <option>Open level</option>
                                    <option>Beginner</option>
                                    <option>Elementary</option>
                                    <option>Intermediate</option>
                                    <option>Upper intermediate</option>
                                    <option>Advanced</option>
                                    <option>Expert</option>
                                    <option>Master</option>
                                    <option>Pro</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="level_number" class="df-form-label">Level code</label>
                                <input wire:model="level_number" type="text" class="df-form-input bg-gray-100" disabled>
                            </div>

                            <div class="col-span-6">
                                <fieldset class="mt-1">
                                    <legend class="text-base leading-6 font-medium text-gray-900">Course type</legend>
                                    <div class="mt-4">
                                        <div class="flex items-center">
                                            <input wire:model="type" type="radio" value="class"
                                                class="form-radio df-form-radio" id="type">
                                            <label for="type" class="ml-3 df-form-label">
                                                Class
                                                <p class="text-gray-500">
                                                    A class is generally once or twice per week for a period of a month
                                                    or longer.
                                                </p>
                                            </label>
                                        </div>
                                        <div class="mt-4 flex items-center">
                                            <input wire:model="type" type="radio" class="form-radio df-form-radio"
                                                value="workshop" id="type">
                                            <label for="type" class="ml-3 df-form-label">
                                                Workshop
                                                <p class="text-gray-500">
                                                    A workshop is a class focused on an specific topic that last a one
                                                    or more hours the same day.
                                                </p>
                                            </label>
                                        </div>
                                        <div class="mt-4 flex items-center">
                                            <input wire:model="type" type="radio" value="bootcamp"
                                                class="form-radio df-form-radio" id="type">
                                            <label for="type" class="ml-3 df-form-label">
                                                Bootcamp
                                                <p class="text-gray-500">
                                                    A Bootcamp is a set of workshops happening the same
                                                    week. Also called Intensive week
                                                </p>
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-span-6">
                                <fieldset class="mt-1">
                                    <legend class="text-base leading-6 font-medium text-gray-900">
                                        Teaching Focus
                                    </legend>
                                    <div class="mt-4">
                                        <div class="flex items-center">
                                            <input wire:model="focus" type="radio" class="form-radio df-form-radio"
                                                value="partnerwork">
                                            <label for="focus" class="ml-3 df-form-label">Partnerwork</label>
                                        </div>
                                        <div class="mt-1 flex items-center">
                                            <input wire:model="focus" type="radio" class="form-radio df-form-radio"
                                                value="footwork">
                                            <label for="focus" class="ml-3 df-form-label">Footwork</label>
                                        </div>
                                        <div class="mt-1 flex items-center">
                                            <input wire:model="focus" type="radio" class="form-radio df-form-radio"
                                                value="styling">
                                            <label for="focus" class="ml-3 df-form-label">Styling</label>
                                        </div>
                                        <div class="mt-1 flex items-center">
                                            <input wire:model="focus" type="radio" class="form-radio df-form-radio"
                                                value="body movements">
                                            <label for="focus" class="ml-3 df-form-label">Body movements</label>
                                        </div>
                                        <div class="mt-1 flex items-center">
                                            <input wire:model="focus" type="radio" class="form-radio df-form-radio"
                                                value="choreography">
                                            <label for="focus" class="ml-3 df-form-label">Choreography</label>
                                        </div>
                                        <div class="mt-1 flex items-center">
                                            <input wire:model="focus" type="radio" class="form-radio df-form-radio"
                                                value="theory">
                                            <label for="focus" class="ml-3 df-form-label">Theory</label>
                                        </div>
                                        <div class="mt-1 flex items-center">
                                            <input wire:model="focus" type="radio" class="form-radio df-form-radio"
                                                value="stretching">
                                            <label for="focus" class="ml-3 df-form-label">Stretching</label>
                                        </div>
                                        <div class="mt-1 flex items-center">
                                            <input wire:model="focus" type="radio" class="form-radio df-form-radio"
                                                value="mix">
                                            <label for="focus" class="ml-3 df-form-label">Mix</label>
                                        </div>
                                        <div class="mt-1 flex items-center">
                                            <input wire:model="focus" type="radio" class="form-radio df-form-radio"
                                                value="other">
                                            <label for="focus" class="ml-3 df-form-label">Other</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-span-6">
                                @if ($action == 'create')
                                @if ($thumbnail)
                                <img src="{{ $thumbnail->temporaryUrl() }}" class="mb-2">
                                @endif
                                @else
                                @isset($thumbnail)
                                <img src="{{ asset('uploads/'. $thumbnail) }}" class="mb-2">
                                @endisset
                                @endif

                                <label for="thumbnail" class="df-form-label">Thumbnail</label>
                                <input wire:model="thumbnail" type="file">
                                <p class="mt-2 text-sm text-gray-500">
                                    Upload main photo (default resolution HD 1920x1080 pixels)
                                </p>
                                @error('thumbnail')<span class="error">{{ $message }}</span>@enderror
                            </div>


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
</div>