<div>
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                    <p class="mt-1 text-sm leading-5 text-gray-600">
                        Please enter the default information of the user.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">First
                                        name</label>
                                    <input id="name" name="name" value="{{ old('name') }}"
                                        class="mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror">
                                    @error('name')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="lastname" class="block text-sm font-medium leading-5 text-gray-700">Last
                                        name</label>
                                    <input id="lastname" name="lastname" value="{{ old('lastname') }}"
                                        class="mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('lastname') border-red-500 @enderror">
                                    @error('lastname')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email"
                                        class="block text-sm font-medium leading-5 text-gray-700">Email</label>
                                    <input id="email" name="email" type="email" value="{{ old('email') }}"
                                        class="mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror">
                                    @error('email')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700">
                                        Country
                                    </label>
                                    <input id="country" list="countries" name="country" value="{{ old('country') }}"
                                        class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('country') border-red-500 @enderror">
                                    @include('shared.countries')
                                    @error('country')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>



                                <div class="col-span-6">
                                    <label for="facebook" class="block text-sm font-medium leading-5 text-gray-700">
                                        Facebook Profile Url
                                    </label>
                                    <input id="facebook" name="facebook" value="{{ old('country') }}"
                                        class="mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <label for="birthday"
                                        class="block text-sm font-medium leading-5 text-gray-700">Birthday</label>
                                    <input id="birthday" name="birthday" type="date" value="{{ old('birthday') }}"
                                        required
                                        class="mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                </div>
                                {{-- 
                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="mobile"
                                        class="block text-sm font-medium leading-5 text-gray-700">Mobile</label>
                                    <input id="mobile" name="mobile" value="{{ old('mobile') }}"
                                class="mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm
                                sm:leading-5">
                            </div> --}}

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="password"
                                    class="block text-sm font-medium leading-5 text-gray-700">Password</label>
                                <input id="password" name="password" type="password" value="{{ old('password') }}"
                                    class="mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-500 @enderror">
                                @error('password')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-span-6 sm:col-span-3">
                                <label for="aware_of_df" class="block text-sm font-medium leading-5 text-gray-700">
                                    How did you learn about us?
                                </label>
                                <select id="aware_of_df" name="aware_of_df" class="form-select df-form-select">
                                    <option disabled selected>Select</option>
                                    <option value="facebook" {{ old('aware_of_df') == 'facebook' ? 'selected':'' }}>
                                        Facebook</option>
                                    <option value="instagram" {{ old('aware_of_df') == 'instagram' ? 'selected':'' }}>
                                        Instagram</option>
                                    <option value="google" {{ old('aware_of_df') == 'google' ? 'selected':'' }}>
                                        Google
                                    </option>
                                    <option value="party" {{ old('aware_of_df') == 'party' ? 'selected':'' }}>Dance
                                        Party</option>
                                    <option value="festival" {{ old('aware_of_df') ==' festival' ? 'selected':'' }}>
                                        In a Festival
                                    </option>
                                    <option value="friend" {{ old('aware_of_df') == 'friend' ? 'selected':'' }}>
                                        From a friend</option>
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
                                    <option value="current-student"
                                        {{ old('aware_of_df') == 'current-student' ? 'selected':'' }}>
                                        I am a current dancefloor student
                                    </option>
                                </select>
                            </div>

                            <fieldset class="col-span-6 sm:col-span-6">
                                <legend class="text-base leading-6 font-medium text-gray-900">Gender</legend>
                                <div class="mt-4">
                                    <div class="flex items-center">
                                        <input id="gender" name="gender" type="radio" class="form-radio df-form-radio"
                                            value="male" {{ old('gender') == 'male' ? 'checked': '' }}>
                                        <label for="male" class="ml-3">
                                            <span class="block text-sm leading-5 font-medium text-gray-700">Male</span>
                                        </label>
                                    </div>
                                    <div class="mt-4 flex items-center">
                                        <input id="gender" name="gender" type="radio" class="form-radio df-form-radio"
                                            value="female" {{ old('gender') == 'female' ? 'checked': '' }}>
                                        <label for="female" class="ml-3">
                                            <span class="df-form-label">Female</span>
                                        </label>
                                    </div>
                                </div>
                                @error('gender')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </fieldset>

                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button
                            class="py-2 px-4 border border-transparent text-xs leading-5 uppercase font-medium rounded-md text-white bg-gray-900 shadow-sm hover:bg-gray-800 focus:outline-none focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out">
                            Save
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>