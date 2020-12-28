<div id="{{ $status }}" class="{{ $bgColor }} px-2 py-1 rounded-full inline-flex items-center text-white">
    @include('icons.' . $icon, ['style'=>'w-4 h-4'])
    <span class="ml-2 text-sm capitalize">{{ $label }}</span>
</div>