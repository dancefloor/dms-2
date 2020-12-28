<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Role & Permissions</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Update roles and permissions for this user.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form method="POST" wire:submit.prevent="updateUserRoles">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">

                        @if (session()->has('success'))
                        <x-partials.flash-message />
                        @endif


                        <fieldset>
                            <div class="mt-4 space-y-2">
                                @foreach (\App\Models\Role::all() as $role)
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" wire:model="roles" value="{{ $role->slug}}"
                                            class="form-checkbox df-form-checkbox">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="comments"
                                            class="font-medium text-gray-700">{{ $role->name }}</label>
                                        <p class="text-gray-500">{{ $role->label }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </fieldset>

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