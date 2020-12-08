<x-app-layout>
    <x-slot name="header">
        <div
            class="bg-white border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Users
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">
                <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                        Export
                    </button>
                </span>
                <span class="order-0 sm:order-1 sm:ml-3 shadow-sm rounded-md">
                    <a href="{{ route('users.create') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-700 hover:bg-red-600 focus:outline-none focus:shadow-outline-red focus:border-red-700 active:bg-indigo-700 transition duration-150 ease-in-out">
                        Add User
                    </a>
                </span>
            </div>
        </div>
    </x-slot>


    <x-shared.alert />



    <!-- Pinned projects -->
    <div class="px-4 mt-6 sm:px-6 lg:px-8">
        <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Statistiques</h2>
        <ul class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4 mt-3">
            <x-user.stat-males />
            <x-user.stat-females />
        </ul>
    </div>


    <livewire:user.datatable />



</x-app-layout>