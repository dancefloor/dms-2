<div class="fixed inset-0 overflow-hidden z-50" x-show="preview" @click.away="preview = false">
    <div class="absolute inset-0 overflow-hidden">
        <section class="absolute inset-y-0 right-0 pl-10 max-w-full flex sm:pl-16">
            <!-- Slide-over panel, show/hide based on slide-over state.-->
            <!-- Entering: "transform transition ease-in-out duration-500 sm:duration-700" From: "translate-x-full" To: "translate-x-0" -->
            <!-- Leaving: "transform transition ease-in-out duration-500 sm:duration-700" From: "translate-x-0" To: "translate-x-full" -->
            <div class="w-screen max-w-2xl">
                <div class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll">
                    <header class="px-4 py-6 sm:px-6">
                        <div class="flex items-start justify-between space-x-3">
                            <h2 class="text-lg leading-7 font-medium text-gray-900">
                                Profile
                            </h2>
                            <div class="h-7 flex items-center">
                                <button aria-label="Close panel" @click="preview = false"
                                    class="text-gray-400 hover:text-gray-500 transition ease-in-out duration-150">
                                    <!-- Heroicon name: x -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </header>
                    <!-- Main -->
                    <div class="divide-y divide-gray-200">
                        <div class="pb-6">
                            <div class="bg-gray-800 h-24 sm:h-20 lg:h-28"></div>
                            <div
                                class="-mt-12 flow-root px-4 space-y-6 sm:-mt-8 sm:flex sm:items-end sm:px-6 sm:space-x-6 lg:-mt-15">
                                <div>
                                    <div class="-m-1 flex">
                                        <div class="inline-flex rounded-lg overflow-hidden border-4 border-white">
                                            <img class="flex-shrink-0 h-24 w-24 sm:h-40 sm:w-40 lg:w-48 lg:h-48"
                                                src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-5 sm:flex-1">
                                    <div>
                                        <div class="flex items-center space-x-2.5">
                                            <h3
                                                class="font-bold text-xl leading-7 text-gray-900 sm:text-2xl sm:leading-8">
                                                {{ $user->name }} {{ $user->lastname }}
                                            </h3>
                                            <span aria-label="Online"
                                                class="bg-green-400 flex-shrink-0 inline-block h-2 w-2 rounded-full"></span>
                                        </div>
                                        <p class="text-sm leading-5 text-gray-500">{{ $user->email }}</p>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <span class="flex-shrink-0 w-full inline-flex rounded-md shadow-sm sm:flex-1">
                                            <a href="mailto:{{$user->email}}"
                                                class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-700 hover:bg-red-600 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition ease-in-out duration-150">
                                                Message
                                            </a>
                                        </span>
                                        <span
                                            class="mt-3 flex-1 w-full inline-flex rounded-md shadow-sm sm:mt-0 sm:ml-3">
                                            <button type="button"
                                                class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                                                Call
                                            </button>
                                        </span>
                                        <span class="mt-3 ml-3 inline-flex rounded-md shadow-sm sm:mt-0">
                                            <div class="relative inline-block text-left">
                                                <a href="{{ route('users.show', $user) }}"
                                                    class="inline-flex items-center p-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-400 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                                                    <!-- Heroicon name: dots-vertical -->
                                                    @include('icons.view')
                                                </a>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-5 sm:px-0 sm:py-0">
                            <dl class="space-y-8 sm:space-y-0">
                                <div class="sm:flex sm:space-x-6 sm:px-6 sm:py-5">
                                    <dt
                                        class="text-sm leading-5 font-medium text-gray-500 sm:w-40 sm:flex-shrink-0 lg:w-48">
                                        Bio
                                    </dt>
                                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                        <p>
                                            {{ $user->biography }}
                                        </p>
                                    </dd>
                                </div>
                                <div class="sm:flex sm:space-x-6 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                                    <dt
                                        class="text-sm leading-5 font-medium text-gray-500 sm:w-40 sm:flex-shrink-0 lg:w-48">
                                        Location
                                    </dt>
                                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $user->address }} {{ $user->city }} {{ $user->postal_code }}
                                        {{ $user->country }}
                                    </dd>
                                </div>
                                <div class="sm:flex sm:space-x-6 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                                    <dt
                                        class="text-sm leading-5 font-medium text-gray-500 sm:w-40 sm:flex-shrink-0 lg:w-48">
                                        Mobile
                                    </dt>
                                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $user->mobile }}
                                    </dd>
                                </div>
                                <div class="sm:flex sm:space-x-6 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                                    <dt
                                        class="text-sm leading-5 font-medium text-gray-500 sm:w-40 sm:flex-shrink-0 lg:w-48">
                                        Birthday
                                    </dt>
                                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                        <time datetime="1982-06-23">
                                            @if ($user->birthday )
                                            {{ $user->birthday->format('F d, Y') }}
                                            @endif
                                        </time>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>