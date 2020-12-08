<div class="grid grid-cols-6 gap-6">
    @if ($course->monday)
    <div class="col-span-6 sm:col-span-2">
        {{ __('Monday') }}
    </div>
    <div class="col-span-6 sm:col-span-2">
        {{ $course->start_time_mon }}
    </div>
    <div class="col-span-6 sm:col-span-2">
        {{ $course->end_time_mon }}
    </div>
    @endif

    @if ($course->tuesday)
    <div class="col-span-6 sm:col-span-2">
        {{ __('Tuesday') }}
    </div>
    <div class="col-span-6 sm:col-span-2">
        {{ $course->start_time_tue }}
    </div>
    <div class="col-span-6 sm:col-span-2">
        {{ $course->end_time_tue }}
    </div>
    @endif

    @if ($course->wednesday)
    <div class="col-span-6 sm:col-span-2">
        {{ __('Monday') }}
    </div>
    <div class="col-span-6 sm:col-span-2">
        {{ $course->start_time_wed }}
    </div>
    <div class="col-span-6 sm:col-span-2">
        {{ $course->end_time_wed }}
    </div>
    @endif

    @if ($course->thursday)
    <div class="col-span-6 sm:col-span-2">
        {{ __('Thursday') }}
    </div>
    <div class="col-span-6 sm:col-span-2">
        {{ $course->start_time_thu }}
    </div>
    <div class="col-span-6 sm:col-span-2">
        {{ $course->end_time_thu }}
    </div>
    @endif

    @if ($course->friday)
    <div class="col-span-6 sm:col-span-2">
        {{ __('Friday') }}
    </div>
    <div class="col-span-6 sm:col-span-2">
        {{ $course->start_time_fri }}
    </div>
    <div class="col-span-6 sm:col-span-2">
        {{ $course->end_time_fri }}
    </div>
    @endif

    @if ($course->saturday)
    <div class="col-span-6 sm:col-span-2">
        {{ __('Saturday') }}
    </div>
    <div class="col-span-6 sm:col-span-2">
        {{ $course->start_time_sat }}
    </div>
    <div class="col-span-6 sm:col-span-2">
        {{ $course->end_time_sat }}
    </div>
    @endif

    @if ($course->sunday)
    <div class="col-span-6 sm:col-span-2">
        {{ __('Sunday') }}
    </div>
    <div class="col-span-6 sm:col-span-2">
        {{ $course->start_time_sun }}
    </div>
    <div class="col-span-6 sm:col-span-2">
        {{ $course->end_time_sun }}
    </div>
    @endif

</div>