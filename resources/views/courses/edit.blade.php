<x-app-layout>
    <x-slot name="head">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css" />         --}}
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" /> --}}
    </x-slot>

    <x-slot name="header">
        <div
            class="bg-white border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Edit Course
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">
                <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
                    <a href="{{ url()->previous() }}" class="df-btn-secondary">
                        Back
                    </a>
                </span>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mt-2 sm:mt-0">
            <livewire:course.default-form action="edit" :course="$course" />
        </div>
        <x-jet-section-border />

        <div class="mt-10 sm:mt-0">
            <livewire:course.pricing-form :course="$course" />
        </div>
        <x-jet-section-border />


        <div class="mt-10 sm:mt-0">
            <livewire:course.online-form :course="$course" />
        </div>
        <x-jet-section-border />

        <div class="mt-10 sm:mt-0">
            <livewire:course.schedule-form :course="$course" />
        </div>
        <x-jet-section-border />

        <div class="mt-10 sm:mt-0">
            <livewire:course.videos-form :course="$course" />
        </div>
        <x-jet-section-border />

        <div id="extra-info" class="mt-10 sm:mt-0">
            <x-course.extra-info-form :course="$course" />
        </div>
        <x-jet-section-border />

    </div>
</x-app-layout>