<x-app-layout>
    <x-slot name="header">
        <div class="bg-white border-b border-gray-200 px-2 py-4 flex items-center justify-between">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                Back
            </a>
            <div class="min-w-0 ml-2">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Course details
                </h1>
            </div>
            <div class="flex sm:mt-0 sm:ml-4">
                <span class="order-1 ml-3 shadow-sm rounded-md sm:order-0 sm:ml-0">
                    <a href="{{ route('courses.edit', $course )}}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                        Edit
                    </a>
                </span>
                @if ($course->students->count() == 0)
                <span class="order-0 sm:order-1 sm:ml-3 shadow-sm rounded-md">
                    @include('shared.delete',['item'=> $course, 'action'=>'courses.destroy', 'type'=> 'button'])
                </span>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 flex justify-between">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Course ID: {{ $course->id }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Created on {{ $course->created_at->format('M d, Y') }}
                    </p>
                </div>
                <div>
                    @switch($course->status)
                    @case('active')
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-green-200 text-green-800">
                        {{ $course->status }}
                    </span>
                    @break
                    @case('finished')
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-200 text-red-800">
                        {{ $course->status }}
                    </span>
                    @break
                    @default
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-gray-200 text-gray-800">
                        {{ $course->status }}
                    </span>
                    @endswitch
                </div>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Course name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $course->name }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Slug
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $course->slug }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Dates
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            @if ($course->start_date)
                            {{ $course->start_date->format('d F Y') }} - {{ $course->end_date->format('d F Y') }}
                            @endif
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Schedule
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <x-partials.time-schedule :course="$course" />
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Level
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $course->level }} {{ $course->level_number }}
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Focus
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $course->focus }}
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Pricing
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <div>Full price: {{ $course->full_price }} CHF</div>
                            <div>Reduced price: {{ $course->reduced_price }} CHF</div>

                            @if ($course->promo_price)
                            <div>Promo Price: {{ $course->promo_price }} ({{ $course->promo_price_expiry_date }}) CHF
                            </div>
                            @endif

                            @if ($course->live_price)
                            <div>Live Price: {{ $course->live_price }} CHF</div>
                            @endif

                            @if ($course->online_price)
                            <div>Online Price: {{ $course->online_price }} EUR</div>
                            @endif
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Type
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $course->type }}
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Classroom
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            @if ($course->classroom)
                            {{ $course->classroom->name }}
                            @endif
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Is standby?
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $course->to_waiting ? 'Yes':'No' }}
                        </dd>
                    </div>


                    @if ($course->keywords)
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Keywords
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $course->keywords }}
                        </dd>
                    </div>
                    @endif

                    @if ($course->tagline)
                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">
                            Tagline
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $course->tagline }}
                        </dd>
                    </div>
                    @endif

                    @if ($course->excerpt)
                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">
                            Excerpt
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $course->excerpt }}
                        </dd>
                    </div>
                    @endif

                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">
                            Description
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $course->description }}
                        </dd>
                    </div>

                    @if ($course->live_description)
                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">
                            Live Description
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $course->live_description }}
                        </dd>
                    </div>
                    @endif

                    @if ($course->online_description)
                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">
                            Online Description
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $course->online_description }}
                        </dd>
                    </div>
                    @endif

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Teachers
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <ul class="border border-gray-200 rounded-md">
                                @forelse ($course->teachers as $p)
                                <li
                                    class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5 {{ $loop->last ? '':'border-b border-gray-200'}}">
                                    <div class="w-0 flex-1 flex items-center text-gray-700">
                                        <img class="inline-block h-8 w-8 rounded-full" src="{{ $p->profile_photo_url }}"
                                            alt="">
                                        <span class="ml-2 flex-1 w-0 truncate">
                                            {{ $p->name }} {{ $p->lastname }}
                                        </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ route('users.show', $p) }}"
                                            class="font-medium text-red-700 hover:text-red-800 transition duration-150 ease-in-out">
                                            Details
                                        </a>
                                    </div>
                                </li>
                                @empty
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                                    There are no teachers attached to this course
                                </li>
                                @endforelse
                            </ul>
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Styles
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <ul class="border border-gray-200 rounded-md">
                                @forelse ($course->styles as $p)
                                <li
                                    class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5 {{ $loop->last ? '':'border-b border-gray-200'}}">
                                    <div class="w-0 flex-1 flex items-center text-gray-700">
                                        <span class="ml-2 flex-1 w-0 truncate">
                                            {{ $p->name }}
                                        </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ route('styles.show', $p) }}"
                                            class="font-medium text-red-700 hover:text-red-800 transition duration-150 ease-in-out">
                                            Details
                                        </a>
                                    </div>
                                </li>
                                @empty
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                                    There are no styles attached to this course
                                </li>
                                @endforelse
                            </ul>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <br>

        @include('courses.view.attendances')

        <br>

        @include('courses.view.students')

        <br>

        @include('courses.view.media')
    </div>
</x-app-layout>