<x-app-layout>
    <x-slot name="header">
        <div
            class="bg-white border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate inline-flex">
                    @include('icons.keys')
                    <span class="ml-2">Roles and Permissions</span>
                </h1>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <x-shared.alert />

        <div class="space-y-3 sm:flex sm:items-center sm:justify-between sm:space-x-4 sm:space-y-0">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Roles
            </h3>
            <div class="flex space-x-3">
                <span class="shadow-sm rounded-md">
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                        Export
                    </button>
                </span>
                <span class="shadow-sm rounded-md">
                    <a href="{{ route('roles.create') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-700 hover:bg-red-600 focus:outline-none focus:shadow-outline-red focus:border-red-600 active:bg-red-700 transition duration-150 ease-in-out">
                        Add Role
                    </a>
                </span>
            </div>
        </div>
        <br>
        <x-shared.role-permission-datatable :model="$roles" route="roles" />
        <br>
        <br>
        <div class="space-y-3 sm:flex sm:items-center sm:justify-between sm:space-x-4 sm:space-y-0">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Permissions
            </h3>
            <div class="flex space-x-3">
                <span class="shadow-sm rounded-md">
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                        Export
                    </button>
                </span>
                <span class="shadow-sm rounded-md">
                    <a href="{{ route('permissions.create') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-700 hover:bg-red-600 focus:outline-none focus:shadow-outline-red focus:border-red-600 active:bg-red-700 transition duration-150 ease-in-out">
                        Add Permission
                    </a>
                </span>
            </div>
        </div>
        <br>
        <x-shared.role-permission-datatable :model="$permissions" route="permissions" />
    </div>
</x-app-layout>