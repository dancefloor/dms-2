<div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">
    <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
    <button @click="showMobileSidebar = true"
        class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:bg-gray-100 focus:text-gray-600 lg:hidden"
        aria-label="Open sidebar">
        <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            viewBox="0 0 24 24" stroke="currentColor">
            <path d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
    </button>
    <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
        <div class="flex-1 flex">
            <form class="w-full flex md:ml-0" action="#" method="GET">
                <label for="search_field" class="sr-only">Search</label>
                <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                        </svg>
                    </div>
                    <input id="search_field"
                        class="block w-full h-full pl-8 pr-3 py-2 rounded-md text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 sm:text-sm"
                        placeholder="Search" type="search">
                </div>
            </form>
        </div>
        <div class="flex items-center">
            <!-- Profile dropdown -->
            <x-shared.account-dropdown />
        </div>
    </div>
</div>