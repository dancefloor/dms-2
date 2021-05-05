<div id="{{ $status }}" class="{{ $bgColor }} py-1 px-2 rounded-full inline-flex items-center text-white">
    @include('icons.' . $icon, ['style'=>'w-4 h-4'])
    <span class="ml-2 text-xs capitalize">{{ $label }}</span>
</div>