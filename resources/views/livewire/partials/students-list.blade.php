<div x-data="{form:false}">
    <ul class="border border-gray-200 rounded-md">
        @forelse ($course->students as $s)
        <li
            class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5 {{ $loop->last ? '':'border-b border-gray-200'}}">
            <div class="flex items-center text-gray-700">
                <div class="flex items-center text-gray-700">
                    <img class="inline-block h-8 w-8 rounded-full" src="{{ $s->profile_photo_url }}" alt="">
                    <a href="{{ route('users.show', $s) }}"
                        class="ml-2 font-medium text-red-800 hover:underline transition duration-150 ease-in-out">
                        {{ $s->name }} {{ $s->lastname }}
                    </a>
                </div>
            </div>
            <div>
                {{ $s->email }}
            </div>
            <div>
                <x-partial.registration-status :user="$s" cid="{{ $course->id }}" />
            </div>
            <div class="flex items-center">
                <form wire:submit.prevent="updateStatus({{$s->id}})" x-show="form" class="flex items-center">
                    <div>
                        <select wire:model="status.{{$s->id}}"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="" selected disabled>Choose status</option>
                            <option value="canceled">Canceled</option>
                            <option value="standby">Standby</option>
                            {{-- <option value="pre-registered">Pre-register</option> --}}
                            {{-- <option value="rejected">Rejected</option> --}}
                        </select>
                    </div>
                    <button type="submit" class="ml-4 text-red-700 hover:underline" @click="form=false">Save</button>
                    @if (session('success'))
                    {{ session('sucess') }}
                    @endif
                </form>
                <button @click="form=true" x-show="!form" class="text-red-700 hover:underline">Update</button>
            </div>

        </li>
        @empty
        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
            There are no students attached to this course
        </li>
        @endforelse
    </ul>
</div>