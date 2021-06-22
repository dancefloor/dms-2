<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Media
        </h3>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Thumbnail
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    @if ($course->thumbnail)
                    <img src="{{ asset('uploads/'. $course->thumbnail) }}" alt="">
                    @endif
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Video 1
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    @if ($course->teaser_video_1)
                    {!! $course->teaser_video_1 !!}
                    @endif
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Video 2
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    @if ($course->teaser_video_2)
                    {!! $course->teaser_video_2 !!}
                    @endif
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Video 3
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    @if ($course->teaser_video_3)
                    {!! $course->teaser_video_3 !!}
                    @endif
                </dd>
            </div>
        </dl>
    </div>
</div>