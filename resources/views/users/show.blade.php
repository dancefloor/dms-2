<x-app-layout>
    <x-slot name="header">
        <div class="bg-white border-b border-gray-200 px-2 py-4 flex items-center justify-between">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                Back
            </a>
            <div class="min-w-0 ml-2">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    User details
                </h1>
            </div>
            <div class="flex sm:mt-0 sm:ml-4">
                <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
                    <a href="{{ route('users.edit', $user )}}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                        Edit
                    </a>
                </span>
                <span class="order-0 sm:order-1 sm:ml-3 shadow-sm rounded-md">
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-700 hover:bg-red-600 focus:outline-none focus:shadow-outline-red focus:border-red-700 active:bg-indigo-700 transition duration-150 ease-in-out">
                        Delete
                    </button>
                </span>
            </div>
        </div>
    </x-slot>

    <div class="my-10 mx-auto max-w-7xl">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="flex items-center border-b border-gray-200 py-3">
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="h-20 w-20 rounded-full mx-3">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $user->name }}'s Information
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Personal details.
                    </p>
                </div>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Full name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $user->name }} {{ $user->lastname }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Mobile
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $user->mobile }}
                            @if ($user->mobile_verified_at)
                            (verified {{ $user->mobile_verified_at->diffForHumans() }})
                            @endif
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Email address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $user->email }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Phone
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $user->phone }}
                            @if ($user->phone_verified_at)
                            (verified {{ $user->phone_verified_at->diffForHumans() }})
                            @endif
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Birthday
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            @if ($user->birthday)
                            {{ $user->birthday->format('F d, Y') }} ({{ $user->age }} years old)
                            @endif
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Gender
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $user->gender }}
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Work Status
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <table class="w-full">
                                <tr>
                                    <td>
                                        <div class="inline-flex capitalize">
                                            <span class="mr-2">{{ $user->work_status }}</span>
                                            @if ($user->work_status_verified == 1)
                                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                Not verified
                                            </span>
                                            {{-- <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg> --}}
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inline-flex capitalize">
                                            <span class="mr-1">Expiry date:
                                                {{ $user->unemployement_expiry_date->format('Y-m-d') }}
                                            </span>
                                            @if ($user->unemployement_expiry_date->gt(Carbon\Carbon::now()))
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-500"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                expired
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ asset('uploads/'. $user->unemployement_proof)}}" target="_blank"
                                            class="text-red-600 hover:underline">view
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Profession
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $user->profession }}
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Professional Branch
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $user->branch }}
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            How did he/she heard of dancefloor
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $user->aware_of_df }}
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $user->address }} <br>
                            @if ( $user->address_info )
                            {{ $user->address_info }} <br>
                            @endif
                            {{ $user->postal_code }} {{ $user->city }} <br>
                            {{ $user->state }} {{ $user->country }}
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Social Media
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <div class="flex space-x-2 items-center">
                                @if ($user->facebook)
                                <a href="{{ $user->facebook }}" class="hover:text-red-700">
                                    @include('icons.social.facebook-circled')
                                </a>
                                @endif

                                @if ($user->linkedin)
                                <a href="{{ $user->linkedin }}" class="hover:text-red-700">
                                    @include('icons.social.linkedin')
                                </a>
                                @endif

                                @if ($user->instagram)
                                <a href="{{ $user->instagram }}" class="hover:text-red-700">
                                    @include('icons.social.instagram-circled')
                                </a>
                                @endif

                                @if ($user->youtube)
                                <a href="{{ $user->youtube }}" class="hover:text-red-700">
                                    @include('icons.social.youtube-circled')
                                </a>
                                @endif

                                @if ($user->tiktok)
                                <a href="{{ $user->tiktok }}" class="hover:text-red-700">
                                    {{-- @include('icons.social.tiktok') --}}
                                </a>
                                @endif

                                @if ($user->linkedin)
                                <a href="{{ $user->twitter }}" class="hover:text-red-700">
                                    @include('icons.social.twitter-circled')
                                </a>
                                @endif

                                @if ($user->skype)
                                <a href="{{ $user->skype }}" class="hover:text-red-700">
                                    @include('icons.social.skype')
                                </a>
                                @endif

                                @if ($user->snapchat)
                                <a href="{{ $user->snapchat }}" class="hover:text-red-700">
                                    @include('icons.social.snapchat')
                                </a>
                                @endif

                                @if ($user->pinterest)
                                <a href="{{ $user->pinterest }}" class="hover:text-red-700">
                                    @include('icons.social.pinterest')
                                </a>
                                @endif
                            </div>
                        </dd>
                    </div>


                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">
                            About
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $user->biography }}
                        </dd>
                    </div>

                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">
                            Orders
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <livewire:user.orders-list user="{{ $user->id }}" />
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>