<!-- This example requires Tailwind CSS v2.0+ -->
<div class="fixed inset-0 overflow-hidden" x-show="slideOver"
    x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
    x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
    x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
    <div class="absolute inset-0 overflow-hidden">
        <section class="absolute inset-y-0 right-0 pl-10 max-w-full flex sm:pl-16" @click.away="slideOver = false"
            aria-labelledby=" slide-over-heading">
            <div class="w-screen max-w-2xl">
                <div class="h-full flex flex-col py-6 bg-gray-50 shadow-xl overflow-y-scroll">
                    <div class="px-4 sm:px-6">
                        <div class="flex items-start justify-between">
                            <h2 id="slide-over-heading"
                                class="text-lg font-bold text-gray-900 inline-flex items-center">
                                @include('icons.basket')
                                <span class="ml-2">Cart</span>
                            </h2>
                            <div class="ml-3 h-7 flex items-center">
                                <button @click="slideOver=false"
                                    class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span class="sr-only">Close panel</span>
                                    <!-- Heroicon name: x -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 relative flex-1 px-4 sm:px-6">
                        <!-- Replace with your content -->
                        <div class="absolute inset-0 px-4 sm:px-6">
                            <livewire:partials.cart />
                        </div>
                        <!-- /End replace -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>