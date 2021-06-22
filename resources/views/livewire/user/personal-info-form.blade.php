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

                        <x-jet-validation-errors class="mb-4" />

                        <fieldset>
                            <legend class="text-base leading-6 font-medium text-gray-900">Gender</legend>
                            <div class="mt-4">
                                <div class="flex items-center">
                                    <input wire:model="user.gender" type="radio" class="form-radio df-form-radio"
                                        value="male" {{ $user->gender == 'male' ? 'checked': '' }}>
                                    <label for="male" class="ml-3">
                                        <span class="block text-sm leading-5 font-medium text-gray-700">Male</span>
                                    </label>
                                </div>
                                <div class="mt-4 flex items-center">
                                    <input wire:model="user.gender" type="radio" class="form-radio df-form-radio"
                                        value="female" {{ $user->gender == 'female' ? 'checked': '' }}>
                                    <label for="female" class="ml-3">
                                        <span class="df-form-label">Female</span>
                                    </label>
                                </div>
                            </div>
                        </fieldset>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-2">
                                <x-form.date-input name="user.birthday" />
                                {{-- <label for="birthday" class="">Birthday</label> --}}
                                {{-- <input id="birthday" class="" type="date" wire:model="birthday"> --}}
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label for="profession" class="df-form-label">Profession</label>
                                <input id="profession" class="form-input df-form-input" wire:model="user.profession">
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
                                <textarea id="biography" rows="3" wire:model="user.biography"
                                    class="form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                    placeholder="about you"></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Brief description for your profile. URLs are hyperlinked.
                            </p>
                        </div>


                        <div class="grid grid-cols-6 gap-6 mt-6">


                            <div class="col-span-6 sm:col-span-2">
                                <label for="work_status" class="df-form-label">Work status</label>
                                <select id="work_status" class="form-select df-form-select"
                                    wire:model="user.work_status">
                                    <option value="">Select</option>
                                    <option value="working">
                                        Working
                                    </option>
                                    <option value="student">Student
                                    </option>
                                    <option value="unemployed">
                                        Unemployed
                                    </option>
                                </select>
                            </div>
                            {{ $user->work_status }}

                            @if ($user->work_status != 'working')
                            <div class="col-span-6 sm:col-span-3">
                                <label for="unemployementProof" class="df-form-label">Unemployement proof</label>
                                <input type="file" class="mt-1" wire:model="unemployementProof">
                                @error('unemployementProof')
                                {{ $message}}
                                @enderror
                                @if ($unemployementProof)
                                <div>
                                    <span class="text-sm text-gray-500">
                                        {{ $unemployementProof }}
                                    </span>
                                </div>

                                @endif
                            </div>

                            @can('crud_users')
                            <div class="col-span-6 sm:col-span-3">
                                <x-form.date-input name="user.unemployement_expiry_date"
                                    label="Unemployment Expiry date" />

                                {{-- <label for="unemployement_expiry_date" class="df-form-label">Unemployement expiry
                                    date</label>
                                <input id="unemployement_expiry_date" class="form-input df-form-input" type="date"
                                    wire:model="unemployement_expiry_date"> --}}
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="work_status_verified" class="df-form-label">
                                    Verification
                                </label>
                                <div class="mt-2">
                                    <input id="work_status_verified" class="df-form-checkbox" type="checkbox"
                                        wire:model="user.work_status_verified"><span class="text-gray-600 ml-2">Work
                                        status
                                        verified</span>
                                </div>
                            </div>
                            @endcan
                            @endif

                            <div class="col-span-6 sm:col-span-3 sm:col-start-1">
                                <label for="aware_of_df" class="block text-sm font-medium leading-5 text-gray-700">
                                    How did you learn about us?
                                </label>
                                <select id="country" class="form-select df-form-select" wire:model="user.aware_of_df">
                                    <option value="" default disabled>Select</option>
                                    <option value="facebook">Facebook</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="google">Google</option>
                                    <option value="party">Dance Party</option>
                                    <option value="festival">In a Festival</option>
                                    <option value="friend">A friend</option>
                                    <option value="ads">Social media ads(Facebook, instagram, twitter, etc)</option>
                                    <option value="public-manifestation">Public manifestation (ex: Fête de Genève,
                                        Automnales)</option>
                                    <option value="instructor">From an instructor</option>
                                    <option value="current-student">
                                        I am a current dancefloor student
                                    </option>
                                </select>
                            </div>

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