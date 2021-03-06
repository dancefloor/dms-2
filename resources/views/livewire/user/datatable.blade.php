<div>

    <div class="px-4 sm:pl-6 md:pl-6 lg:pl-8 mt-6 w-full sm:w-3/4 md:w-1/2">
        <input type="search" name="search" wire:model="search" class="df-form-input" placeholder="Search...">
    </div>

    <!-- Projects list (only on smallest breakpoint) -->
    <div class="mt-10 sm:hidden">
        <div class="px-4 sm:px-6 border-t border-gray-200 bg-gray-50">
            <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide pt-2">User</h2>
        </div>
        <ul class="mt-3 border-t border-gray-200 divide-y divide-gray-100 bg-white">
            @foreach ($users as $user)
            <li>
                <a href="{{ route('users.show', $user) }}"
                    class="flex items-center justify-between px-4 py-4 hover:bg-gray-50 sm:px-6">
                    <div class="flex items-center truncate space-x-3">
                        <x-user.role-gender-icon :user="$user" />
                        <p class="font-medium truncate text-sm leading-6">
                            {{ $user->name }} {{ $user->lastname }}
                            <span class="truncate font-normal text-gray-500">{{ $user->email }}</span>
                        </p>
                    </div>
                    <!-- Heroicon name: chevron-right -->

                    <svg class="ml-4 h-5 w-5 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- Projects table (small breakpoint and up) -->
    <div class="hidden mt-8 sm:block">
        <div class="align-middle inline-block min-w-full border-b border-gray-200">
            <table class="min-w-full">
                <thead>
                    <tr class="border-t border-gray-200">
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span class="lg:pl-2">User</span>
                        </th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Country / Age
                        </th>
                        <th
                            class="hidden md:table-cell px-6 py-3 border-b border-gray-200 text-left bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Role
                        </th>
                        <th
                            class="hidden md:table-cell px-6 py-3 border-b border-gray-200 text-left bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Work Status
                        </th>
                        <th
                            class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($users as $user)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <div class="flex items-center">
                                <x-user.role-gender-icon :user="$user" />
                                <div class="flex-shrink-0 h-10 w-10 ml-2">
                                    <img class="h-10 w-10 rounded-full flex-shrink-0 bg-gray-300"
                                        src="{{ $user->profile_photo_url }}" alt="{{ $user->name}}">
                                </div>
                                <div class="ml-4">
                                    <a href="{{ route('users.show', $user) }}"
                                        class="text-sm leading-5 font-medium text-gray-900 hover:text-gray-800 hover:underline">
                                        {{ $user->name }} {{ $user->lastname }}
                                    </a>
                                    <div class="text-sm leading-5 text-gray-500">
                                        {{ $user->email}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <div class="text-sm leading-5 text-gray-900">{{ $user->country }}</div>
                            @if ($user->age != 0)
                            <div class="text-sm leading-5 text-gray-500">
                                {{ $user->age }} years old
                            </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $user->mobile }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <div class="inline-flex">
                                <span class="mr-1">{{ $user->work_status }}</span>
                                @if ($user->work_status != 'working')
                                @if ($user->work_status_verified == 1)
                                <svg class="flex-shrink-0 h-5 w-5 text-green-500" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                @else
                                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                                @endif
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap flex justify-end items-center text-gray-400">
                            <a href="{{ route( 'users.edit', $user) }}" class="mx-1 hover:text-red-700">
                                @include('icons.pen')
                            </a>

                            <a href="{{ route('orders.create', ['user' => $user ]) }}" class="mx-1 hover:text-red-700">
                                @include('icons.new-order')
                            </a>

                            @if ($user->hasPendingOrders())
                            <a href="{{ route('payments.create', ['user' => $user ]) }}"
                                class="mx-1 hover:text-red-700">
                                @include('icons.payment')
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-2 px-6">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>