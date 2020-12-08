<nav class="px-2 md:px-3 md:mt-6">
    <div class="space-y-1">
        <a href="{{ route('welcome') }}"
            class="group df_nav_links {{ Request::is('welcome') ? 'df_nav_links_active' : '' }}">
            @include('icons.home', ['style'=>'h-5 w-5 mr-4'])
            Home
        </a>

        <a href="{{ route('dashboard') }}"
            class="group df_nav_links {{ Request::is('dashboard') ? 'df_nav_links_active' : '' }}">
            @include('icons.dashboard', ['style'=>'h-5 w-5 mr-4'])
            Dashboard
        </a>

        <a href="{{ route('welcome') }}"
            class="group df_nav_links {{ Request::is('welcome') ? 'df_nav_links_active' : '' }}">
            @include('icons.catalogue', ['style'=>'h-5 w-5 mr-4'])
            Catalogue
        </a>

        <a href="{{ route('courses.index') }}"
            class="group df_nav_links {{ Request::is('courses') ? 'df_nav_links_active' : '' }}">
            @include('icons.classroom', ['style'=>'h-5 w-5 mr-4'])
            Courses
        </a>

        <a href="{{ route('locations.index') }}" class="group df_nav_links">
            @include('icons.pinpoint', ['style'=>'h-5 w-5 mr-4'])
            Locations
        </a>

        <a href="{{ route('styles.index') }}"
            class="group df_nav_links {{ Request::is('styles') ? 'df_nav_links_active' : '' }}">
            @include('icons.music-genre', ['style'=>'h-5 w-5 mr-4'])
            Styles
        </a>

        <a href="{{ route('orders.index') }}"
            class="group df_nav_links {{ Request::is('orders') ? 'df_nav_links_active' : '' }}">
            @include('icons.orders', ['style'=>'h-5 w-5 mr-4'])
            Orders
        </a>

        <a href="{{ route('payments.index') }}" class="group df_nav_links">
            @include('icons.credit-cards', ['style'=>'h-5 w-5 mr-4'])
            Transactions
        </a>

        <a href="{{ route('users.index') }}"
            class="group df_nav_links {{ Request::is('users') ? 'df_nav_links_active' : '' }}">
            @include('icons.users', ['style'=>'h-5 w-5 mr-4'])
            Users
        </a>

        <a href="{{ route('roles.index') }}"
            class="group df_nav_links {{ Request::is('roles') ? 'df_nav_links_active' : '' }}">
            @include('icons.keys', ['style'=>'h-5 w-5 mr-4'])
            Roles & Permissions
        </a>

    </div>
    <div class="mt-8">
        <!-- Secondary navigation -->
        <h3 class="px-3 text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider" id="teams-headline">
            Teams
        </h3>
        <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">
            <a href="#"
                class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-200 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition ease-in-out duration-150">
                <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full"></span>
                <span class="truncate">
                    Cuban Salsa
                </span>
            </a>

            <a href="#"
                class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-200 rounded-md hover:text-gray-100 hover:bg-gray-700 focus:outline-none focus:bg-gray-50 transition ease-in-out duration-150">
                <span class="w-2.5 h-2.5 mr-4 bg-teal-400 rounded-full"></span>
                <span class="truncate">
                    Line Salsa
                </span>
            </a>

            <a href="#"
                class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-200 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition ease-in-out duration-150">
                <span class="w-2.5 h-2.5 mr-4 bg-orange-500 rounded-full"></span>
                <span class="truncate">
                    Urban
                </span>
            </a>
        </div>
    </div>
</nav>