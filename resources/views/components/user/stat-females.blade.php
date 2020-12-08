<li class="relative col-span-1 flex shadow-sm rounded-md" x-data="{ open: false}">
    <div
        class="flex-shrink-0 flex items-center justify-center w-16 bg-pink-600 text-white text-sm leading-5 font-medium rounded-l-md">
        FE
    </div>
    <div
        class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
        <div class="flex-1 px-4 py-2 text-sm leading-5 truncate">
            <a href="#" class="text-gray-900 font-medium hover:text-gray-600 transition ease-in-out duration-150">
                Females
            </a>
            <p class="text-gray-500">{{ $females }} Members</p>
        </div>
        <div class="flex-shrink-0 pr-2">
            <button id="pinned-project-options-menu-0" aria-has-popup="true" @click="open = true"
                class="w-8 h-8 inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition ease-in-out duration-150">
                <!-- Heroicon name: dots-vertical -->
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                </svg>
            </button>

            <!-- Dropdown panel, show/hide based on dropdown state.-->
            <!-- Entering: "transition ease-out duration-100" From: "transform opacity-0 scale-95" To: "transform opacity-100 scale-100"-->
            <!-- Leaving: "transition ease-in duration-75" From: "transform opacity-100 scale-100" To: "transform opacity-0 scale-95"-->

            <div class="z-10 mx-3 origin-top-right absolute right-10 top-3 w-48 mt-1 rounded-md shadow-lg" x-show="open"
                @click.away="open = false">
                <div class="rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
                    aria-labelledby="pinned-project-options-menu-0">
                    <div class="py-1">
                        <a href="#"
                            class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                            role="menuitem">View</a>
                    </div>
                    <div class="border-t border-gray-100"></div>
                    <div class="py-1">
                        <a href="#"
                            class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                            role="menuitem">Removed from pinned</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                            role="menuitem">Share</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>