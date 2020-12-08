<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Pricing Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Please enter the respective pricing
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="updatePrice" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">

                        <x-shared.alert />

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="full_price" class="df-form-label">Full price</label>
                                <input wire:model="full_price" class="df-form-input" type="number" step=".01">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="reduced_price" class="df-form-label">Reduced price</label>
                                <input wire:model="reduced_price" class="df-form-input" type="number" step=".01">
                                <p class="mt-2 text-sm text-gray-500">
                                    Price for students or unemployed
                                </p>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="promo_price" class="df-form-label">Promo price</label>
                                <input wire:model="promo_price" class="df-form-input" type="number" step=".01">
                                <p class="mt-2 text-sm text-gray-500">
                                    Price whenever there is a promotion
                                </p>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="promo_price_expiry_date" class="df-form-label">Expiry Date</label>
                                <input wire:model="promo_price_expiry_date" class="df-form-input" type="date">
                                <p class="mt-2 text-sm text-gray-500">
                                    Promotion deadline
                                </p>
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