<div class="inline-flex text-gray-600 text-sm">
    <span>
        @include('icons.calendar', ['style' => 'w-4 text-gray-600 mr-2'])
    </span>
    <span>
        {{ \Carbon\Carbon::parse( $course->start_date )->format('M d, Y') }}

        - {{ \Carbon\Carbon::parse( $course->end_date )->format('M d, Y') }}
    </span>
</div>