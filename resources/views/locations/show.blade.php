<x-app-layout>
    <x-slot name="header">
        <div class="bg-white border-b border-gray-200 px-2 py-4 flex items-center justify-between">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                Back
            </a>
            <div class="min-w-0 ml-2">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Location details
                </h1>
            </div>
            <div class="flex sm:mt-0 sm:ml-4">
                <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
                    <a href="{{ route('locations.edit', $location )}}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                        Edit
                    </a>
                </span>
                <span class="order-0 sm:order-1 sm:ml-3 shadow-sm rounded-md">
                    @include('shared.delete',['item'=> $location, 'action'=>'locations.destroy', 'type'=> 'button'])
                </span>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Location Information
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    Location details and associated classrooms.
                </p>
            </div>
            <div class="px-4 py-5 sm:p-0">
                <dl>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Name
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $location->name }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Slug
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $location->slug }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Shortname
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $location->shortname }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Contact
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $location->contact }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Website
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $location->website }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Email
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $location->email }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Phone
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $location->phone }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Comments
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $location->comments }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Address
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            @if ($location->google_maps)
                            <div class="mb-2">{!! $location->google_maps !!}</div>
                            @endif
                            {{ $location->address }} <br>
                            {{ $location->address_info }} <br>
                            {{ $location->city }}, {{ $location->postal_code }} ({{ $location->neighborhood }}) <br>
                            {{ $location->state }}, {{ $location->country }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Public transportation
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $location->public_transportation }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Google Maps link
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <a href="{{ $location->google_maps_shortlink }}" target="_blank" class="hover:text-gray-500"
                                rel="noopener noreferrer">{{ $location->google_maps_shortlink }}</a>
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Entry code
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $location->entry_code }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Video
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            @if ($location->video)
                            {!! $location->video !!}
                            @endif
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Contract
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            @if ($location->contract)
                            <a href="{{ asset('uploads/'. $location->contract) }}" class="df-btn-secondary"
                                target="_blank">Download</a>
                            @endif
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Classrooms
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul class="border border-gray-200 rounded-md">
                                @forelse ($location->classrooms as $c)
                                <li
                                    class="pl-3 pr-4 py-3 flex locations-center justify-between text-sm leading-5 {{ $loop->last ? '':'border-b border-gray-200'}}">
                                    <div class="w-0 flex-1 flex items-center text-gray-700">
                                        <span class="ml-2 flex-1 w-0 truncate">
                                            {{ $c->name }}
                                        </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ route('classrooms.show', $c) }}"
                                            class="font-medium text-red-700 hover:text-red-800 transition duration-150 ease-in-out">
                                            Details
                                        </a>
                                    </div>
                                </li>
                                @empty
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                                    There are no classrooms attached to this location
                                </li>
                                @endforelse
                            </ul>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>