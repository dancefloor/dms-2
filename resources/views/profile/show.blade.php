<x-app-layout>
    <x-slot name="header">
        <div
            class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 bg-white">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    {{ __('Profile') }}
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4"></div>
        </div>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
            @livewire('profile.update-profile-information-form')

            <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
                @livewire('profile.update-password-form')
            </div>

            <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                <livewire:user.personal-info-form :user="Auth::user()" />
            </div>
            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                <livewire:user.contact-form :user="Auth::user()" />
            </div>
            <x-jet-section-border />


            <div class="mt-10 sm:mt-0">
                <livewire:user.address-form :user="Auth::user()" />
            </div>
            <x-jet-section-border />


            <div class="mt-10 sm:mt-0">
                <livewire:user.social-form :user="Auth::user()" />
            </div>
            <x-jet-section-border />


            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <div class="mt-10 sm:mt-0">
                @livewire('profile.two-factor-authentication-form')
            </div>

            <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('profile.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>