<x-app-layout>
    <x-slot name="header">
        <div
            class="bg-white border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Create Course
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">
                <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-red-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                        Cancel
                    </button>
                </span>
            </div>
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <livewire:course.default-form action="create" />
    </div>
</x-app-layout>