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
                <span class="order-0 sm:order-1 sm:ml-3 shadow-sm rounded-md">
                    @include('shared.delete',['item'=> $course, 'action'=>'courses.destroy', 'type'=> 'button'])
                </span>
            </div>
        </div>
    </x-slot>

    {{-- <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <iframe width="100%" height="800" frameborder="0" marginheight="0" marginwidth="0" allowtransparency="true"
            src="https://www.crowdcast.io/e/eh1j19j9?navlinks=false&embed=true"
            style="border: 1px solid #EEE;border-radius:3px" allowfullscreen="true" webkitallowfullscreen="true"
            mozallowfullscreen="true" allow="microphone; camera;"></iframe><a
            ng-href="https://www.crowdcast.io/?utm_source=embed&utm_medium=website&utm_campaign=embed"
            style="color: #aaa; font-family: 'Helvetica', 'Arial', sans-serif;text-decoration: none;display: block;text-align: center;font-size: 13px;padding: 5px 0">powered
            by Crowdcast</a>
    </div>--}}
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        {!! $course->teaser_video_1 !!}
    </div>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Course Information
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    Created on {{ $course->created_at->format('M d, Y') }}
                </p>
            </div>
            <div class="px-4 py-5 sm:p-0">
                <dl>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            ID
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->id }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Name
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->name }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            slug
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->slug }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Status
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
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
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Tagline
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->tagline }}
                        </dd>
                    </div>

                    @if ($course->keywords)
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Keywords
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->keywords }}
                        </dd>
                    </div>
                    @endif

                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Full Price
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->full_price }} CHF
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Reduced Price
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->reduced_price }} CHF
                        </dd>
                    </div>

                    @if ($course->promo_price)
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Promo Price
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->promo_price }} ({{ $course->promo_price_expiry_date }}) CHF
                        </dd>
                    </div>
                    @endif

                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Live Price
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->live_price }} EUR
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Online Price
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->online_price }} EUR
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Start Date
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            @if ($course->start_date)
                            {{ $course->start_date }}
                            @endif
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            end_date
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->end_date }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            level
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->level }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Level Number
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->level_number }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Focus
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->focus }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            type
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->type }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            is_online
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->is_online }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            online_link
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->online_link }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            to_waiting
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->to_waiting }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Classroom
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            @if ($course->classroom)
                            {{ $course->classroom->name }}
                            @endif
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Schedule
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-partials.time-schedule :course="$course" />
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Teachers
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
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
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Styles
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
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
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Students
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul class="border border-gray-200 rounded-md">
                                @forelse ($course->students as $p)
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
                                    There are no students attached to this course
                                </li>
                                @endforelse
                            </ul>
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Thumbnail
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            @if ($course->thumbnail)
                            <img src="{{ asset('uploads/'. $course->thumbnail) }}" alt="">
                            @endif
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Video 1
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            @if ($course->teaser_video_1)
                            {!! $course->teaser_video_1 !!}
                            @endif
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Video 2
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            @if ($course->teaser_video_2)
                            {!! $course->teaser_video_2 !!}
                            @endif
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Video 3
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            @if ($course->teaser_video_3)
                            {!! $course->teaser_video_3 !!}
                            @endif
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Excerpt
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->excerpt }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Description
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->description }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Online Description
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->online_description }}
                        </dd>
                    </div>
                    <div
                        class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Live Description
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $course->live_description }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>


$table->string('portrait')->nullable();
$table->foreignId('user_id');