<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    This information will be displayed publicly so be careful what you share.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="updatePersonalInfo" method="POST">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">

                        <x-shared.alert />

                        <fieldset>
                            <legend class="text-base leading-6 font-medium text-gray-900">Gender</legend>
                            <div class="mt-4">
                                <div class="flex items-center">
                                    <input wire:model="gender" type="radio" class="form-radio df-form-radio"
                                        value="male" {{ $gender == 'male' ? 'checked': '' }}>
                                    <label for="male" class="ml-3">
                                        <span class="block text-sm leading-5 font-medium text-gray-700">Male</span>
                                    </label>
                                </div>
                                <div class="mt-4 flex items-center">
                                    <input wire:model="gender" type="radio" class="form-radio df-form-radio"
                                        value="female" {{ $gender == 'female' ? 'checked': '' }}>
                                    <label for="female" class="ml-3">
                                        <span class="df-form-label">Female</span>
                                    </label>
                                </div>
                            </div>
                        </fieldset>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-2">
                                <label for="birthday" class="df-form-label">Birthday</label>
                                <input id="birthday" class="form-input df-form-input" type="date" wire:model="birthday">
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="profession" class="df-form-label">Profession</label>
                                <input id="profession" class="form-input df-form-input" wire:model="profession">
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="branch" class="df-form-label">Branch</label>
                                <input id="branch" class="form-input df-form-input" wire:model="branch">
                            </div>
                        </div>

                        <div class="mt-6">
                            <label for="biography" class="df-form-label">
                                About
                            </label>
                            <div class="rounded-md shadow-sm">
                                <textarea id="biography" rows="3" wire:model="biography"
                                    class="form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                    placeholder="about you"></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Brief description for your profile. URLs are hyperlinked.
                            </p>
                        </div>


                        <div class="grid grid-cols-6 gap-6 mt-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="aware_of_df" class="block text-sm font-medium leading-5 text-gray-700">
                                    How did you learn about us?
                                </label>
                                <select id="country" class="form-select df-form-select" wire:model="aware_of_df">
                                    <option disabled selected>Select</option>
                                    <option value="facebook" {{ old('aware_of_df') == 'facebook' ? 'selected':'' }}>
                                        Facebook</option>
                                    <option value="instagram" {{ old('aware_of_df') == 'instagram' ? 'selected':'' }}>
                                        Instagram</option>
                                    <option value="google" {{ old('aware_of_df') == 'google' ? 'selected':'' }}>Google
                                    </option>
                                    <option value="party" {{ old('aware_of_df') == 'party' ? 'selected':'' }}>Dance
                                        Party</option>
                                    <option value="festival" {{ old('aware_of_df') ==' festival' ? 'selected':'' }}>
                                        In a Festival
                                    </option>
                                    <option value="friend" {{ old('aware_of_df') == 'friend' ? 'selected':'' }}>From a
                                        friend</option>
                                    <option value="ads" {{ old('aware_of_df') == 'ads' ? 'selected':'' }}>
                                        Social media ads(Facebook, instagram, twitter, etc)
                                    </option>
                                    <option value="public-manifestation"
                                        {{ old('aware_of_df') == 'public-manifestation' ? 'selected':'' }}>
                                        Public manifestation (ex: Fête de Genève, Automnales)
                                    </option>
                                    <option value="instructor" {{ old('aware_of_df') == 'instructor' ? 'selected':'' }}>
                                        From an instructor
                                    </option>
                                    <option value="current-student"
                                        {{ old('aware_of_df') == 'current-student' ? 'selected':'' }}>
                                        I am a current dancefloor student
                                    </option>
                                </select>
                            </div>

                            @can('edit_users')
                            <div class="col-span-6 sm:col-span-2">
                                <label for="work_status" class="df-form-label">Work status</label>
                                <select id="work_status" class="form-select df-form-select" wire:model="work_status">
                                    <option disabled selected>Select</option>
                                    <option value="working" {{$work_status == 'working' ? 'selected':''}}>
                                        Working
                                    </option>
                                    <option value="student" {{$work_status == 'student' ? 'selected':''}}>Student
                                    </option>
                                    <option value="unemployed" {{$work_status == 'unemployed' ? 'selected':''}}>
                                        Unemployed
                                    </option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-1">
                                <label for="price_hour" class="df-form-label">Price per hour</label>
                                <input id="price_hour" class="form-input df-form-input" type="number"
                                    wire:model="price_hour">
                            </div>


                            @if ($work_status != 'working')
                            <div class="col-span-6 sm:col-span-3">
                                <label for="unemployement_proof" class="df-form-label">Unemployement proof</label>
                                <input type="file" class="mt-1" wire:model="unemployement_proof">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="unemployement_expiry_date" class="df-form-label">Unemployement expiry
                                    date</label>
                                <input id="unemployement_expiry_date" class="form-input df-form-input" type="date"
                                    wire:model="unemployement_expiry_date">
                            </div>
                            @endif
                            @endcan


                        </div>


                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <span class="inline-flex rounded-md shadow-sm">
                            <button type="submit" class="df-form-btn">
                                Save
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>