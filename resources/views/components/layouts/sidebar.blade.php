<div class="lg:hidden" x-show="showMobileSidebar">
    <div class="fixed inset-0 flex z-40">
        <!-- Off-canvas menu overlay, show/hide based on off-canvas menu state.-->
        <!-- Entering: "transition-opacity ease-linear duration-300" From: "opacity-0" To: "opacity-100"-->
        <!-- Leaving: "transition-opacity ease-linear duration-300" From: "opacity-100" To: "opacity-0"-->

        <div class="fixed inset-0">
            <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
        </div>
        <!-- Off-canvas menu, show/hide based on off-canvas menu state. -->
        <!-- Entering: "transition ease-in-out duration-300 transform" From: "-translate-x-full" To: "translate-x-0"-->
        <!-- Leaving: "transition ease-in-out duration-300 transform" From: "translate-x-0" To: "-translate-x-full"-->

        <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-gray-800">
            <div class="absolute top-0 right-0 -mr-14 p-1">
                <button @click="showMobileSidebar =  false"
                    class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-gray-600"
                    aria-label="Close sidebar">
                    <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-shrink-0 flex items-center px-4">
                @include('icons.logo-white', ['style'=> 'h-12 w-auto'])
            </div>
            <div class="mt-5 flex-1 h-0 overflow-y-auto">
                @include('partials.navigation')
            </div>
        </div>
        <div class="flex-shrink-0 w-14">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
    </div>
</div>

<!-- Static sidebar for desktop -->
<div class="hidden lg:flex lg:flex-shrink-0">
    <div class="flex flex-col w-64 border-r border-gray-800 pt-5 pb-4 bg-gray-800">
        <div class="flex items-center flex-shrink-0 px-6">
            <a href="{{ route('dashboard') }}">
                @include('icons.logo-white', ['style'=> 'h-12 w-auto'])
            </a>
        </div>
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="h-0 flex-1 flex flex-col overflow-y-auto">
            <!-- User account dropdown -->

            <x-layouts.profile-dropdown />



            <!-- Sidebar Search -->
            {{-- <div class="px-3 mt-5">
                <label for="search" class="sr-only">Search</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <!-- Heroicon name: search -->
                        <svg class="mr-3 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input id="search" class="form-input block w-full pl-9 sm:text-sm sm:leading-5"
                        placeholder="Search">
                </div>
            </div> --}}


            <!-- Navigation -->
            @include('partials.navigation')
        </div>
    </div>
</div>