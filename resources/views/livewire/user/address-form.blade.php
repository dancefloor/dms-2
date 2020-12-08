<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Address</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Use a permanent address where you can receive mail.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form method="POST" wire:submit.prevent="updateUserAddress">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">

                        <x-shared.alert />

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="country" class="block text-sm font-medium leading-5 text-gray-700">
                                    Country / Region
                                </label>
                                <input id="country" list="countries" wire:model="country"
                                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                @include('shared.countries')
                            </div>

                            <div class="col-span-6">
                                <label for="address" class="block text-sm font-medium leading-5 text-gray-700">Street
                                    Address</label>
                                <input id="address" wire:model="address"
                                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                <label for="address_info"
                                    class="block text-sm font-medium leading-5 text-gray-700">Information
                                    complementaire</label>
                                <input id="address_info" wire:model="address_info"
                                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="city" class="block text-sm font-medium leading-5 text-gray-700">City</label>
                                <input id="city" wire:model="city"
                                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="state" class="block text-sm font-medium leading-5 text-gray-700">State /
                                    Province</label>
                                <input id="state" wire:model="state"
                                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="postal_code" class="block text-sm font-medium leading-5 text-gray-700">ZIP /
                                    Postal</label>
                                <input id="postal_code" wire:model="postal_code"
                                    class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="df-form-btn">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>