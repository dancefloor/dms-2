<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Contact Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Please let us know your phone contact information
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form method="POST" wire:submit.prevent="updateUserContact">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="mobile" class="df-form-label">Mobile</label>
                                <input id="mobile" wire:model="mobile" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="mobile_verified_at" class="df-form-label">Verified at</label>
                                @if ($mobile_verified_at)
                                <span class="inline-flex text-sm text-gray-700 mt-3">
                                    {{date('d-m-Y', strtotime($user->mobile_verified_at)) }} @include('icons.success')
                                </span>
                                @else
                                @can('edit_users')
                                <input id="mobile_verified_at" wire:model="mobile_verified_at" type="date"
                                    class="form-input df-form-input">
                                @endcan
                                @endif
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="phone" class="df-form-label">Phone</label>
                                <input id="phone" wire:model="phone" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="phone_verified_at" class="df-form-label">Verified at</label>
                                @if ($phone_verified_at)
                                <span class="inline-flex text-sm text-gray-700 mt-3">
                                    {{date('d-m-Y', strtotime($user->phone_verified_at)) }} @include('icons.success')
                                </span>
                                @else
                                @can('edit_users')
                                <input id="phone_verified_at" wire:model="phone_verified_at" type="date"
                                    class="form-input df-form-input">
                                @endcan
                                @endif

                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="skype" class="df-form-label">Skype</label>
                                <input id="skype" wire:model="skype" class="form-input df-form-input">
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button class="df-form-btn" type="submit">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>