<!-- This example requires Tailwind CSS v2.0+ -->
@if (auth()->user()->work_status == 'working')
<div class="bg-yellow-50 border-l-4 border-yellow-400 p-4" x-data="{ reducedPriceNotification:true }"
    x-show="reducedPriceNotification">
    <div class="flex">
        <div class="flex-shrink-0">
            <!-- Heroicon name: solid/exclamation -->
            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-sm text-yellow-700">
                if you are student or unemployed please let know by updating your
                <a href="{{ route('profile.show')}}"
                    class="font-medium underline text-yellow-700 hover:text-yellow-600">
                    profile
                </a> and by sending us proof by
                email to
                <a href="#" class="font-medium underline text-yellow-700 hover:text-yellow-600">
                    support@dms.com
                </a>
                or by phone to
                <a href="#" class="font-medium underline text-yellow-700 hover:text-yellow-600">
                    +41 22 123 45678
                </a>
            </p>
        </div>
        <div class="ml-auto pl-3">
            <div class="-mx-1.5 -my-1.5">
                <button type="button" @click="reducedPriceNotification=false"
                    class="inline-flex bg-yellow-50 rounded-md p-1.5 text-yellow-500 hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-yellow-50 focus:ring-yellow-600">
                    <span class="sr-only">Dismiss</span>
                    <!-- Heroicon name: solid/x -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endif