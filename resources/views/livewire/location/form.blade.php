<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Location Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Please enter the information related to the place where classroom can be found.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="{{ $action == 'create' ? 'createLocation' : 'updateLocation' }}">
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

                            <div class="col-span-6 sm:col-span-2">
                                <label for="shortname" class="df-form-label">Shortname</label>
                                <input wire:model="shortname" class="form-input df-form-input">
                            </div>
                        </div>
                        <br>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="contact" class="df-form-label">Contact</label>
                                <input wire:model="contact" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="website" class="df-form-label">Website</label>
                                <input wire:model="website" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="phone" class="df-form-label">Phone</label>
                                <input wire:model="phone" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="email" class="df-form-label">Email</label>
                                <input wire:model="email" class="form-input df-form-input">
                            </div>


                            <div class="col-span-6">
                                <label for="address" class="df-form-label">Address</label>
                                <input wire:model="address" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6">
                                <label for="address_info" class="df-form-label">Complementary Information</label>
                                <input wire:model="address_info" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="city" class="df-form-label">City</label>
                                <input wire:model="city" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="postal_code" class="df-form-label">Postal code</label>
                                <input wire:model="postal_code" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="neighborhood" class="df-form-label">Neighborhood</label>
                                <input wire:model="neighborhood" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="state" class="df-form-label">State</label>
                                <input wire:model="state" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="country" class="df-form-label">Country</label>
                                <input wire:model="country" list="countries" class="form-input df-form-input">
                                @include('shared.countries')
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="entry_code" class="df-form-label">Entry code</label>
                                <input wire:model="entry_code" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="google_maps_shortlink" class="df-form-label">Google Maps Shortlink</label>
                                <input wire:model="google_maps_shortlink" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6">
                                @if ($google_maps)
                                <div class="mb-2">{!! $google_maps !!}</div>
                                @endif
                                <label for="google_maps" class="df-form-label">Google Maps</label>
                                <textarea wire:model="google_maps" rows="3"
                                    class="form-textarea df-form-textarea"></textarea>
                            </div>

                            <div class="col-span-6">
                                <label for="public_transportation" class="df-form-label">Public transportation</label>
                                <textarea wire:model="public_transportation" rows="3"
                                    class="form-textarea df-form-textarea"></textarea>
                            </div>

                            <div class="col-span-6">
                                <label for="contract" class="df-form-label">Contract</label>
                                <input wire:model="contract" type="file">
                            </div>


                            <div class="col-span-6">
                                <label for="comments" class="df-form-label">Comments</label>
                                <textarea wire:model="comments" rows="3"
                                    class="form-textarea df-form-textarea"></textarea>
                            </div>

                            <div class="col-span-6">
                                @if ($video)
                                <div class="mb-2">{!! $video !!}</div>
                                @endif
                                <label for="video" class="df-form-label">Video</label>
                                <textarea wire:model="video" rows="3" class="form-textarea df-form-textarea"></textarea>
                            </div>

                            {{-- <div class="col-span-6 sm:col-span-4">
                                <label for="location_id" class="df-form-label">Classrooms</label>
                                <select id="location_id" class="form-select df-form-select">
                                    <option disabled default selected>Select Location</option>
                                    @foreach (\App\Models\Location::all() as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                            </select>
                        </div> --}}

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