<x-guest-layout>
    <div x-data="{ slideOver:false }">
        @include('partials.navbar')
        <div class="bg-gray-100">
            <section class="container mx-auto">
                <livewire:catalogue.schedule />
            </section>
        </div>
        @auth
        <x-partials.slide-over />
        @endauth
    </div>
</x-guest-layout>


{{-- @if (Route::has('login'))
<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    @auth
    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
@else
<a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

@if (Route::has('register'))
<a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
@endif
@endif
</div>
@endif --}}