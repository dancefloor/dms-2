<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Style Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Style Information is used to complete courses descriptions.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="{{ $action == 'create' ? 'createStyle': 'updateStyle' }}" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">

                        <x-shared.alert />

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first_name" class="df-form-label">Name</label>
                                <input wire:model="name" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="slug" class="df-form-label">Slug</label>
                                <input wire:model="slug" class="form-input df-form-input bg-gray-100" disabled>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="color" class="df-form-label">Color</label>
                                <div class="flex items-center">
                                    <input wire:model="color" list="colors" class="form-input df-form-input">
                                    <span
                                        class="bg-{{ $color }} ml-2 flex-shrink-0 inline-block h-2 w-2 rounded-full"></span>
                                </div>
                                @include('shared.colors')
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="family"
                                    class="block text-sm font-medium leading-5 text-gray-700">Family</label>
                                <select wire:model="family" class="form-select df-form-select">
                                    <option default selected disabled>Select dance family</option>
                                    <option value="Cuban Salsa">Cuban Salsa</option>
                                    <option value="Line Salsa">Line Salsa</option>
                                    <option value="Urban">Urban</option>
                                    <option value="Sensual">Sensual</option>
                                    <option value="Fusion">Fusion</option>
                                    <option value="Sport">Sport</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="music" class="df-form-label">Music</label>
                                <input wire:model="music" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6">
                                <label for="description" class="df-form-label">Description</label>
                                <textarea wire:model="description" rows="2"
                                    class="form-textarea df-form-textarea"></textarea>
                                <p class="mt-2 text-sm text-gray-500">Write a few sentences about this style.</p>
                            </div>

                            <div class="col-span-6">
                                @if ($video)
                                <div class="mb-2">
                                    {!! $video !!}
                                </div>
                                @endif
                                <label for="video" class="df-form-label">Video</label>
                                <textarea wire:model="video" rows="3" class="form-textarea df-form-textarea"></textarea>
                                <p class="mt-2 text-sm text-gray-500">Copy and paste the embed code from Youtube or
                                    Facebook.</p>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="year" class=df-form-label>Year</label>
                                <input wire:model="year" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="origin" class="df-form-label">Origin</label>
                                <input wire:model="origin" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="icon" class="df-form-label">Icon</label>
                                <input wire:model="icon" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                @if ($image)
                                <img src="{{ asset('uploads/'. $image )}}" alt="{{ $name }}" class="mb-2">
                                @endif
                                <label for="image" class="df-form-label">Image</label>
                                <input wire:model="image" type="file">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                @if ($portrait)
                                <img src="{{ asset('uploads/'. $portrait )}}" alt="{{ $name }}" class="mb-2">
                                @endif
                                <label for="portrait" class="df-form-label">Portrait</label>
                                <input wire:model="portrait" type="file">
                            </div>
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