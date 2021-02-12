<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" x-data="{ showInfo: false }"
            @keydown.escape="showInfo = !showInfo" x-cloak>
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('First Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="lastname" value="{{ __('Last Name') }}" />
                <x-jet-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"
                    :value="old('lastname')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            {{-- <div class="mt-4">
                <x-jet-label for="facebook" value="{{ __('Facebook') }}" />
            <x-jet-input id="facebook" class="block mt-1 w-full" type="text" name="facebook" :value="old('facebook')"
                required autofocus autocomplete="facebook" />
            <p class="text-xs text-gray-500 ml-2">*Required for the private Facebook group.
                <button @click="showInfo = !showInfo" type="button" class="underline font-bold">More info</button>
            </p>
            <div x-show="showInfo" @click.away="showInfo = false">
                @include('partials.auth-alert')
            </div>
            @error('facebook')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            </div> --}}

            {{-- <div class="mt-4">
                <x-jet-label for="country" value="{{ __('Country') }}" />
            <x-jet-input id="country" list="countries" class="block mt-1 w-full" type="text" name="country"
                :value="old('country')" required autofocus autocomplete="country" />
            @include('shared.countries')
            </div> --}}

            <div class="mt-4">
                <x-jet-label for="birthday" value="{{ __('Birthday') }}" />
                <x-jet-input id="birthday" class="block mt-1 w-full" type="date" name="birthday"
                    :value="old('birthday')" required autofocus autocomplete="birthday" />
                <p class="text-gray-600 text-xs ">format dd.mm.yyyy</p>
                @error('birthday')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="gender" value="{{ __('Gender') }}" />
                <label for="gender">
                    <input type="radio" id="gender" name="gender" value="male"
                        {{ old('gender') == 'male' ? 'checked':''}}>
                    <span class="ml-1 mr-3 text-sm text-gray-600">Male</span>
                    <input type="radio" name="gender" id="gender" value="female"
                        {{ old('gender') == 'female' ? 'checked':''}}>
                    <span class="ml-1 mr-3 text-sm text-gray-600">Female</span>
                </label>
                @error('gender')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="aware_of_df" value="{{ __('How did you learn about us?') }}" />
                <select id="aware_of_df" name="aware_of_df" class="form-select df-form-select">
                    <option disabled selected>Select</option>
                    <option value="facebook" {{ old('aware_of_df') == 'facebook' ? 'selected':'' }}>
                        Facebook</option>
                    <option value="instagram" {{ old('aware_of_df') == 'instagram' ? 'selected':'' }}>
                        Instagram</option>
                    <option value="google" {{ old('aware_of_df') == 'google' ? 'selected':'' }}>Google
                    </option>
                    <option value="party" {{ old('aware_of_df') == 'party' ? 'selected':'' }}>Dance
                        Party</option>
                    <option value="festival" {{ old('aware_of_df') ==' festival' ? 'selected':'' }}>
                        In a Festival
                    </option>
                    <option value="friend" {{ old('aware_of_df') == 'friend' ? 'selected':'' }}>From a
                        friend</option>
                    <option value="ads" {{ old('aware_of_df') == 'ads' ? 'selected':'' }}>
                        Social media ads(Facebook, instagram, twitter, etc)
                    </option>
                    <option value="public-manifestation"
                        {{ old('aware_of_df') == 'public-manifestation' ? 'selected':'' }}>
                        Public manifestation (ex: Fête de Genève, Automnales)
                    </option>
                    <option value="instructor" {{ old('aware_of_df') == 'instructor' ? 'selected':'' }}>
                        From an instructor
                    </option>
                    <option value="current-student" {{ old('aware_of_df') == 'current-student' ? 'selected':'' }}>
                        I am a current dancefloor student
                    </option>
                </select>
                @error('aware_of_df')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
        <br>
    </x-jet-authentication-card>
</x-guest-layout>