<div class="inline-flex w-full text-gray-600 text-sm">
    <span>
        @include('icons.dance', ['style' => 'w-4 text-gray-600 mr-2'])
    </span>
    @foreach ($course->styles as $item)
    {{ $item->name }}
    @endforeach
</div>