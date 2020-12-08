<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Social Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Share your social media links with us.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form method="POST" wire:submit.prevent="updateUserSocial">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">

                        <x-shared.alert />

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-5">
                                <label for="facebook" class="df-form-label">Facebook</label>
                                <input id="facebook" class="form-input df-form-input" wire:model="facebook">
                            </div>

                            <div class="col-span-6 sm:col-span-5">
                                <label for="instagram" class="df-form-label">Instagram</label>
                                <input id="instagram" class="form-input df-form-input" wire:model="instagram">
                            </div>

                            <div class="col-span-6 sm:col-span-5">
                                <label for="twitter" class="df-form-label">Twitter</label>
                                <input id="twitter" class="form-input df-form-input" wire:model="twitter">
                            </div>


                            <div class="col-span-6 sm:col-span-5">
                                <label for="linkedin" class="df-form-label">Linkedin</label>
                                <input id="linkedin" class="form-input df-form-input" wire:model="linkedin">
                            </div>

                            <div class="col-span-6 sm:col-span-5">
                                <label for="pinterest" class="df-form-label">Pinterest</label>
                                <input id="pinterest" class="form-input df-form-input" wire:model="pinterest">
                            </div>

                            <div class="col-span-6 sm:col-span-5">
                                <label for="youtube" class="df-form-label">Youtube</label>
                                <input id="youtube" class="form-input df-form-input" wire:model="youtube">
                            </div>

                            <div class="col-span-6 sm:col-span-5">
                                <label for="tiktok" class="df-form-label">Tiktok</label>
                                <input id="tiktok" class="form-input df-form-input" wire:model="tiktok">
                            </div>

                            <div class="col-span-6 sm:col-span-5">
                                <label for="snapchat" class="df-form-label">Snapchat</label>
                                <input id="snapchat" class="form-input df-form-input" wire:model="snapchat">
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