<div class="relative flex justify-end items-center" x-data="{ showActions: false }">
    <button id="project-options-menu-0" aria-has-popup="true" type="button" @click="showActions = true"
        class="w-8 h-8 inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition ease-in-out duration-150">
        <!-- Heroicon name: dots-vertical -->
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
        </svg>
    </button>
    <!-- Dropdown panel, show/hide based on dropdown state.-->
    <!-- Entering: "transition ease-out duration-100" From: "transform opacity-0 scale-95" To: "transform opacity-100 scale-100"-->
    <!--  Leaving: "transition ease-in duration-75" From: "transform opacity-100 scale-100" To: "transform opacity-0 scale-95" -->

    <div class="mx-3 origin-top-right absolute right-7 top-0 w-48 mt-1 rounded-md shadow-lg" x-show="showActions"
        @click.away="showActions =  false">
        <div class="z-10 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
            aria-labelledby="project-options-menu-0">
            <div class="py-1">
                <a href="{{ route($route . '.show', $item) }}"
                    class="group flex items-center px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                    role="menuitem">
                    @include('icons.view', ['style'=>'mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500
                    group-focus:text-gray-500'])
                    View
                </a>
                <a href="{{ route($route . '.edit', $item) }}"
                    class="group flex items-center px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                    role="menuitem">
                    <!-- Heroicon name: pencil-alt -->
                    <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd"
                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                            clip-rule="evenodd" />
                    </svg>
                    Edit
                </a>
                @include('shared.delete',['model'=> $item, 'action'=>'users.destroy', 'type'=>'link'])
            </div>
        </div>
    </div>
</div>