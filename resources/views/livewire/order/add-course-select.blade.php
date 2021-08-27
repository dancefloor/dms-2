<div class="flex justify-between items-center">
    <div>
        <select name="course" wire:model="course" class="form-select df-form-select">
            <option value="" selected disabled>Select course</option>
            @foreach ($courses as $course)
            <option value="{{ $course->id }}">
                {{ $course->name }} |
                {{ implode(' ', $course->teachers->pluck('name')->toArray())}} | {{ $course->level }} |
                {{ implode(' ', $course->days) }}
            </option>
            @endforeach
        </select>
        @error('course')
        <span class="text-red-600 text-xs">{{ $message }}</span>
        @enderror
    </div>
    <button wire:click.prevent="add" class="ml-2 df-btn-primary" type="button">
        Add
    </button>
</div>