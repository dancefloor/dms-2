<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Work Status</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    This information is useful to define pricing for students and unemployed people
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="updatePersonalInfo" method="POST">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">

                        <x-shared.alert />

                        <x-jet-validation-errors class="mb-4" />


                        <div class="grid grid-cols-6 gap-6">


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

                            @if ($user->work_status != 'working')
                            <div class="col-span-6 sm:col-span-3">
                                <label for="unemployementProof" class="df-form-label">Student/Unemployment proof</label>
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