<x-app-layout>
    <x-slot name="header">
        <div
            class="bg-white border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate inline-flex">
                    Add Permission
                </h1>
            </div>
        </div>
    </x-slot>
    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-shared.role-permission-form />

            <div class="mt-6 sm:mt-5">
                <div class="sm:border-t sm:border-gray-200 sm:pt-5">
                    <div role="group" aria-labelledby="label-email">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                            <div>
                                <div class="text-base leading-6 font-medium text-gray-900 sm:text-sm sm:leading-5 sm:text-gray-700"
                                    id="label-email">
                                    Roles
                                </div>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg">
                                    @foreach ($roles as $p)
                                    <div class="mb-2">
                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="roles" name="roles[]" type="checkbox" value="{{ $p->id }}"
                                                    class="form-checkbox h-4 w-4 text-red-700 transition duration-150 ease-in-out">
                                            </div>
                                            <div class="ml-3 text-sm leading-5">
                                                <label for="comments"
                                                    class="font-medium text-gray-700">{{ $p->name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 border-t border-gray-200 pt-5">
                <div class="flex justify-end">
                    <span class="inline-flex rounded-md shadow-sm">
                        <a href="{{ route('roles.index') }}"
                            class="py-2 px-4 bg-white border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                            Cancel
                        </a>
                    </span>
                    <span class="ml-3 inline-flex rounded-md shadow-sm">
                        <button type="submit" class="df-form-btn">
                            Save
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>