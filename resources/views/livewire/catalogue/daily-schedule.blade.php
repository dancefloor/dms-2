<div class="py-10">

    <h1 class="mx-2 text-xl inline-flex items-center mb-5">
        @include('icons.funnel-fill')
        <span class="ml-2">Filter your courses</span>
    </h1>
    <div class="grid grid-cols-5 gap-2 mx-2">
        <div class="col-span-6 sm:col-span-1">
            <select id="city-filter"
                class="mt-1 block w-full py-2 px-3 border border-red-700 bg-white rounded-md shadow-sm transition duration-150 ease-in-out text-sm leading-5 form-select"
                wire:model="city">
                <option value="">All Cities</option>
                <option value="Geneva">Geneva</option>
                <option value="Lausanne">Lausanne</option>
                <option value="France">France</option>
            </select>
            City: {{ $city }}
        </div>

        <div class="col-span-6 sm:col-span-1">
            <select id="style-filter"
                class="mt-1 block w-full py-2 px-3 border border-red-700 bg-white rounded-md shadow-sm transition duration-150 ease-in-out text-sm leading-5 form-select"
                wire:model="style">
                <option value="">All Styles</option>
                @foreach (\App\Models\Style::all() as $s)
                <option value="{{ $s->id }}">{{ $s->name }}</option>
                @endforeach
            </select>
            Style: {{ $style }}
        </div>
        <div class="col-span-6 sm:col-span-1">
            {{-- <label for="level" class="df-form-label">Level</label> --}}
            <select id="level-filter"
                class="mt-1 block w-full py-2 px-3 border border-red-700 bg-white rounded-md shadow-sm transition duration-150 ease-in-out text-sm leading-5 form-select"
                id="level" wire:model="level">
                <option value="">All Levels</option>
                <option value="open level">Open Level</option>
                <option value="Beginner">Beginner</option>
                <option value="Elementary">Elementary</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Upper Intermediate">Upper Intermediate</option>
                <option value="Advanced">Advanced</option>
                <option value="Expert">Expert</option>
                <option value="Master">Master</option>
            </select>
            Level: {{ $level }}
        </div>
        {{-- <div class="col-span-6 sm:col-span-1">
            <label for="day" class="df-form-label">Location</label>
            <select class="df-form-select form-select" wire:model="location">
                <option value="">All</option>
                @foreach (\App\Models\Classroom::all() as $item)
                <option value="{{ $item->id }}">{{ $item->name }} {{ $item->location->city }}</option>
        @endforeach
        </select>
    </div> --}}
</div>

@if (session()->has('success'))
<x-partials.flash-message type="alert" />
@endif

<section class="mt-5">
    <div class="flex  gap-2">

        <div class="grid grid-cols-4 gap-5">

            <div class="col-span-4 sm:col-span-1">
                <h3 class="text-2xl font-bold mx-3">Monday</h3>
                {{------------------------------ Monday -----------------------------------------------------------------}}
                @forelse ($monday as $course)
                <div class=" m-2 shadow-md hover:shadow-2xl rounded-lg overflow-hidden">
                    <div class="px-3 pt-3 pb-1">
                        <div class="flex justify-between">
                            <h2 class="font-black text-lg text-gray-700">
                                {{ $course->name }}
                            </h2>
                            <span class="text-sm font-extrabold mt-1 w-20 text-right">
                                <x-catalogue.display-price :course="$course" />
                            </span>
                        </div>
                        <div class="w-full text-gray-600 text-sm mb-2">
                            {{ $course->tagline}}
                        </div>
                        <x-shared.course-daily-schedule :course="$course" day="0" />
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span class="inline-flex items-center">
                                <x-partials.level-icon level="{{ $course->level }}" />
                                {{ $course->level }}</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600">
                            <span class="inline-flex items-center">
                                @include('icons.geo-fill', ['style'=>'w-4 mr-2'])
                                {{ $course->neighbourhood ?? '' }}
                            </span>
                        </div>
                        <x-catalogue.display-teachers :course="$course" />
                    </div>
                    @auth
                    <div class="mb-3 mx-3 items-center">
                        <div class="flex justify-between items-center text-gray-100">

                            @if ($course->hasStudent(Auth::user()->id))
                            <div>
                                <x-partial.registration-status :user="auth()->user()" cid="{{ $course->id }}" />
                            </div>
                            <div>
                                <form wire:submit.prevent="deregister({{$course}})">
                                    <button type="submit" class="text-gray-500 hover:text-red-700 pt-2 pr-1">
                                        @include('icons.x-circle-thin')
                                    </button>
                                </form>

                            </div>
                            @else
                            <form wire:submit.prevent="register({{ $course }})" method="post">
                                @csrf
                                <button type="submit" title="Register"
                                    class="w-full bg-gray-200 text-gray-700 hover:bg-red-800 hover:text-white text-sm px-2 py-1 rounded-full inline-flex items-center">
                                    @include('icons.add-to-basket')
                                    <span class="ml-2">Add to basket</span>
                                </button>
                                <input type="hidden" name="option" value="full-price">
                            </form>
                            @endif
                        </div>
                    </div>
                    @endauth
                </div>
                @empty
                <div class="bg-white flex justify-center py-10 border font-semibold rounded-lg">
                    No courses found
                </div>
                @endforelse
            </div>
            <div class="col-span-4 sm:col-span-1">
                <h3 class="text-2xl font-bold mx-3">Tuesday</h3>
                @forelse ($tuesday as $course)
                <livewire:catalogue.course-card2 :course="$course" :key="$course->id" />
                @empty
                <div class="bg-white flex justify-center py-10 border font-semibold rounded-lg">
                    No courses found
                </div>
                @endforelse
            </div>
            <div class="col-span-4 sm:col-span-1">
                <h3 class="text-2xl font-bold mx-3">Wednesday</h3>
                @forelse ($wednesday as $course)
                <livewire:catalogue.course-card2 :course="$course" :key="$course->id" />
                @empty
                <div class="bg-white flex justify-center py-10 border font-semibold rounded-lg">
                    No courses found
                </div>
                @endforelse
            </div>
            <div class="col-span-4 sm:col-span-1">
                <h3 class="text-2xl font-bold mx-3">Thursday</h3>
                @forelse ($thursday as $course)
                <livewire:catalogue.course-card2 :course="$course" :key="$course->id" />
                @empty
                <div class="bg-white flex justify-center py-10 border font-semibold rounded-lg">
                    No courses found
                </div>
                @endforelse
            </div>
        </div>
</section>
</div>