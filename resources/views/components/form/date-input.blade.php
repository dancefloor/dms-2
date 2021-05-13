<div x-data="{ picker: @entangle($name) }"
    x-init="new Pikaday({ field: $refs.datepicker, format: 'YYYY-MM-DD'}).toString('YYYY-MM-DD')"
    x-on:change="picker = $event.target.value">
    <label for="{{ $label }}" class="df-form-label capitalize">
        {{ $label ?? $name }}
    </label>
    <div class="mt-1">
        <input x-bind:value="picker" x-ref="datepicker" name="{{ $name }}" id="datepicker" type="text"
            class="form-input df-form-input @error($name) border-red-600 @enderror">
        @if ($description)
        <p class="mt-1 text-sm text-gray-500">
            {{ $description }}
        </p>
        @endif
    </div>
    @error($name)
    <span class="text-red-600 text-xs">{{ $message }}</span>
    @enderror
</div>