<div>
    <div class="flex items-center space-x-4">
        <div class="flex-shrink-0">
            <img class="h-8 w-8 rounded-full" src="{{ $student->profile_photo_url }}" alt="">
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-sm font-medium text-gray-900 truncate">
                {{ $student->name }} {{ $student->lastname }}
            </p>
            <p class="text-sm text-gray-500 truncate">
                {{ $student->email }}
            </p>
        </div>
        <div class="flex justify-between items-center">
            <div>
                @if (session()->has('updated'))
                <span x-data="{show: true}" x-show="show" x-init="setTimeout( () => show = false, 3000)"
                    class="text-xs text-green-500 truncate mr-2">{{session('updated')}}</span>
                @endif
            </div>
            <select wire:model="presence.status"
                class="form-select mt-1 block w-full pl-3 pr-10 py-1 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option value="" default selected disabled>Select</option>
                <option value="present" {{ $attendance == 'present' ? 'selected':''}}>
                    Present
                </option>
                <option value="absent">Absent
                </option>
                <option value="excused">Excused
                </option>
            </select>
        </div>
    </div>
</div>