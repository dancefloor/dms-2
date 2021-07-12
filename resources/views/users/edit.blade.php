<x-app-layout>
    <x-slot name="head">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    </x-slot>
    <x-slot name="header">
        <div
            class="bg-white border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Edit User
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">
                <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
                    <a href="{{ url()->previous() }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                        Back
                    </a>
                </span>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <livewire:user.default-info :user="$user" />
        <x-jet-section-border />

        <div class="mt-10 sm:mt-0">
            <livewire:user.personal-info-form :user="$user" />
        </div>
        <x-jet-section-border />

        <div class="mt-10 sm:mt-0">
            <livewire:user.work-status :user="$user" />
        </div>
        <x-jet-section-border />

        <div class="mt-10 sm:mt-0">
            <livewire:user.contact-form :user="$user" />
        </div>
        <x-jet-section-border />

        <div class="mt-10 sm:mt-0">
            <livewire:user.address-form :user="$user" />
        </div>
        <x-jet-section-border />


        <div class="mt-10 sm:mt-0">
            <livewire:user.social-form :user="$user" />
        </div>
        <x-jet-section-border />

        @can('crud_roles')
        <div class="mt-10 sm:mt-0">
            <livewire:user.role-form :user="$user" />
        </div>
        <x-jet-section-border />
        @endcan

    </div>
    @push('modals')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    @endpush
</x-app-layout>