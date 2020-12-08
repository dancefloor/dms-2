<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Default Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Update the name, lastname and email.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="updateUserDefaultInfo">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">

                        <x-shared.alert />

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="df-form-label">First name</label>
                                <input wire:model="name" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="lastname" class="df-form-label">Last name</label>
                                <input wire:model="lastname" class="form-input df-form-input">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="email" class="df-form-label">Email address</label>
                                <input wire:model="email" class="form-input df-form-input">
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