<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Classroom Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Please enter all information related to this classroom.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="{{ $action == 'create' ? 'createClassroom' : 'updateClassroom' }}">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="df-form-label">Name</label>
                                <input wire:model="name" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="slug" class="df-form-label">Slug</label>
                                <input wire:model="slug" class="form-input df-form-input bg-gray-100" disabled>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="m2" class="df-form-label">m2</label>
                                <input wire:model="m2" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="capacity" class="df-form-label">Capacity</label>
                                <input wire:model="capacity" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="limit_couples" class="df-form-label">Limit of couples</label>
                                <input wire:model="limit_couples" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="price_hour" class="df-form-label">Price hour</label>
                                <input wire:model="price_hour" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="price_month" class="df-form-label">Price month</label>
                                <input wire:model="price_month" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="color" class="df-form-label">Color</label>
                                <input wire:model="color" list="colors" class="form-input df-form-input">
                                @include('shared.colors')
                            </div>


                            <div class="col-span-6 sm:col-span-4">
                                <label for="location" class="df-form-label">Location</label>
                                <select wire:model="location" class="form-select df-form-select">
                                    <option>Select Location</option>
                                    @foreach (\App\Models\Location::all() as $loc)
                                    <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input wire:model="dance_shoes" type="checkbox"
                                            class="form-checkbox df-form-checkbox">
                                    </div>
                                    <div class="ml-3 text-sm leading-5">
                                        <label for="dance_shoes" class="font-medium text-gray-700">Dance shoes
                                            required?</label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-span-6">
                                <label for="comments" class="df-form-label">Comments</label>
                                <textarea wire:model="comments" rows="3"
                                    class="form-textarea df-form-textarea"></textarea>
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