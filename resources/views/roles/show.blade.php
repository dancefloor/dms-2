<x-app-layout>
    <x-slot name="header">
        <div class="bg-white border-b border-gray-200 px-2 py-4 flex items-center justify-between">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                Back
            </a>
            <div class="min-w-0 ml-2">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Role details
                </h1>
            </div>
            <div class="flex sm:mt-0 sm:ml-4">
                <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
                    <a href="{{ route('roles.edit', $role )}}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                        Edit
                    </a>
                </span>
                <span class="order-0 sm:order-1 sm:ml-3 shadow-sm rounded-md">
                    @include('shared.delete',['item'=> $role, 'action'=>'roles.destroy', 'type'=> 'button'])
                </span>
            </div>
        </div>
    </x-slot>

    <x-shared.role-permission-detail :item="$role" model="role" />

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-10 bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-4 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Users
                </h3>
            </div>
            <ul class="my-1">
                @forelse ($role->users()->paginate(10) as $user)
                <li class="py-2 px-4 {{ $loop->last ? '':'border-b border-gray-200'}}">
                    <div class="inline-flex items-center">
                        <img src="{{ $user->profile_photo_url }}" alt="" class="w-8 rounded-full border mr-2">
                        <a href="{{ route('users.show', $user) }}" class="hover:underline">
                            {{ $user->name }} {{ $user->lastname }}
                        </a>
                    </div>
                </li>
                @empty
                <li class="text-gray-700 py-2 px-2">
                    No users attached to this role
                </li>
                @endforelse
            </ul>
            <div class="mx-3 my-2">
                {{ $role->users()->paginate()->links() }}
            </div>
        </div>
    </div>

</x-app-layout>