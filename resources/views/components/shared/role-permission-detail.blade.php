<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ $model == 'role' ? 'Role' : 'Permission' }} Information
            </h3>
            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                {{ $model == 'role' ? 'Role details and associated permissions.' : 'Permission details and associated roles' }}
            </p>
        </div>
        <div class="px-4 py-5 sm:p-0">
            <dl>
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        ID
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $item->id }}
                    </dd>
                </div>
                <div
                    class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Name
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $item->name }}
                    </dd>
                </div>
                <div
                    class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Slug
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $item->slug }}
                    </dd>
                </div>
                <div
                    class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Label
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $item->label }}
                    </dd>
                </div>
                <div
                    class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        {{ $model == 'role' ? 'Permissions' : 'Roles'}}
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        <ul class="border border-gray-200 rounded-md">
                            @if ($model == 'role')
                            @forelse ($item->permissions as $p)
                            <li
                                class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5 {{ $loop->last ? '':'border-b border-gray-200'}}">
                                <div class="w-0 flex-1 flex items-center text-gray-700">
                                    @include('icons.user-access')
                                    <span class="ml-2 flex-1 w-0 truncate">
                                        {{ $p->name }}
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="{{ route('permissions.show', $p) }}"
                                        class="font-medium text-red-700 hover:text-red-800 transition duration-150 ease-in-out">
                                        Details
                                    </a>
                                </div>
                            </li>
                            @empty
                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                                There are no permissions attached to this role
                            </li>
                            @endforelse
                            @else
                            @forelse ($item->roles as $p)
                            <li
                                class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5 {{ $loop->last ? '':'border-b border-gray-200'}}">
                                <div class="w-0 flex-1 flex items-center text-gray-700">
                                    @include('icons.user-access')
                                    <span class="ml-2 flex-1 w-0 truncate">
                                        {{ $p->name }}
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="{{ route('roles.show', $p) }}"
                                        class="font-medium text-red-700 hover:text-red-800 transition duration-150 ease-in-out">
                                        Details
                                    </a>
                                </div>
                            </li>
                            @empty
                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                                There are no permissions attached to this role
                            </li>
                            @endforelse
                            @endif
                        </ul>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>