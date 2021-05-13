<div class="px-3 mt-6 relative inline-block text-left" x-data="{ showProfileMenu : false}">
    <x-jet-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button type="button" @click="showProfileMenu = true"
                class="group w-full rounded-md px-3.5 py-2 text-sm leading-5 font-medium text-gray-700 hover:bg-gray-700 hover:text-gray-500 focus:outline-none focus:bg-gray-700 focus:border-blue-300 active:bg-gray-700 active:text-gray-200 transition ease-in-out duration-150"
                id="options-menu" aria-haspopup="true" aria-expanded="true">
                <div class="flex w-full justify-between items-center">
                    <div class="flex min-w-0 items-center justify-between space-x-3">
                        <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0"
                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                        <div class="flex-1 min-w-0">
                            <h2 class="text-gray-100 text-sm leading-5 font-medium truncate capitalize">
                                {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                            </h2>
                            {{-- <p class="text-gray-300 text-sm leading-5 truncate">@jessyschwarz</p> --}}
                        </div>
                    </div>
                    <!-- Heroicon name: selector -->
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Account') }}
            </div>

            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                {{ __('Profile') }}
            </x-jet-dropdown-link>

            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                {{ __('API Tokens') }}
            </x-jet-dropdown-link>
            @endif

            <div class="border-t border-gray-100"></div>


            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Logout') }}
                </x-jet-dropdown-link>
            </form>
        </x-slot>
    </x-jet-dropdown>
</div>