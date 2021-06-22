<!--
  Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
  Read the documentation to get started: https://tailwindui.com/documentation
-->
<nav class="bg-gray-800 w-full fixed z-10">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                @if (Request::is('/'))
                <button @click="SlideOverMenu = true" class="text-gray-400 hover:text-gray-100 mr-2 hidden sm:inline">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                @endif

                <div class="flex-shrink-0">
                    <a href="{{ route('welcome') }}">
                        @include('icons.logo-white', ['style'=>'h-10'])
                    </a>
                </div>
                {{-- <div class="hidden sm:block sm:ml-6">
                    <div class="flex">
                        <a href="#landing"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Home</a>
                        <a href="#about"
                            class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">About</a>
                        <a href="#catalogue"
                            class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Catalogue</a>
                    </div>
                </div> --}}
            </div>
            <div class="hidden sm:ml-6 sm:block">
                <div class="flex items-center">
                    @auth
                    @isset($course)
                    @if (Request::is('course/'. $course->id))
                    @can('crud_courses')
                    <a class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out"
                        href="{{ route('courses.edit', $course) }}">
                        @include('icons.edit')

                    </a>
                    @endcan
                    @endif
                    @endisset

                    <button
                        class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out"
                        aria-label="Notifications">
                        @include('icons.bell')

                    </button>

                    <livewire:partials.cart-icon />
                    <x-shared.account-dropdown />
                    @else
                    <a href="{{ route('login') }}"
                        class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Login</a>
                    <a href="{{ route('register') }}"
                        class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Register</a>
                    @endauth

                </div>
            </div>
            <div class="-mr-2 flex sm:hidden">
                <!-- Mobile menu button -->
                <button @click="openMenu = !openMenu"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out"
                    aria-label="Main menu" aria-expanded="false">
                    <!-- Icon when menu is closed. -->
                    <!-- Heroicon name: menu Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{ 'hidden': openMenu, 'block': !openMenu }" class="h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <!-- Heroicon name: x Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{ 'block': openMenu, 'hidden': !openMenu }" class="h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, toggle classes based on menu state. -->
    <!-- Menu open: "block", Menu closed: "hidden" -->

    <div x-show="openMenu" class="sm:hidden">
        <div class="px-2 pt-2 pb-3">
            @include('partials.front-navigation')
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
            @auth
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-6 text-white">{{ auth()->user()->name }}
                        {{ auth()->user()->lastname }}</div>
                    <div class="text-sm font-medium leading-5 text-gray-400">{{ auth()->user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 px-2">
                <a href="{{ route('dashboard') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Your
                    Profile</a>
                <a href="#"
                    class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Settings</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    this.closest('form').submit();"
                        class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                        {{ __('Logout') }}
                    </a>
                </form>

            </div>
            @else
            <div class="mt-3 px-2">
                <a href="{{ route('login') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                    Register
                </a>
            </div>
            @endauth
        </div>
    </div>
</nav>