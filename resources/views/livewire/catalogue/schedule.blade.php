<div class="py-10">
    <h1 class="mx-2 text-xl inline-flex items-center mb-5">
        @include('icons.funnel-fill')
        <span class="ml-2">Filter your courses</span>
    </h1>
    <div class="grid grid-cols-5 gap-2 mx-2">
        <div class="col-span-6 sm:col-span-1">
            <label for="day" class="df-form-label">Day</label>
            <select class="df-form-select form-select" wire:model="day">
                <option value="">All</option>
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
                <option value="friday">Friday</option>
                <option value="saturday">Saturday</option>
                <option value="sunday">Sunday</option>
            </select>
        </div>
        <div class="col-span-6 sm:col-span-1">
            <label for="syle" class="df-form-label">Style</label>
            <select class="df-form-select form-select" wire:model="style">
                <option value="">All</option>
                @foreach (\App\Models\Style::all() as $style)
                <option value="{{ $style->id }}">{{ $style->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-6 sm:col-span-1">
            <label for="level" class="df-form-label">Level</label>
            <select class="df-form-select form-select" id="level" wire:model="level">
                <option value="">All</option>
                <option value="open level">Open Level</option>
                <option value="Beginner">Beginner</option>
                <option value="Elementary">Elementary</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Upper Intermediate">Upper Intermediate</option>
                <option value="Advanced">Advanced</option>
                <option value="Expert">Expert</option>
                <option value="Master">Master</option>
            </select>
        </div>
        <div class="col-span-6 sm:col-span-1">
            <label for="focus" class="df-form-label">Type</label>
            <select class="df-form-select form-select" id="focus" wire:model="focus">
                <option value="">All</option>
                <option value="partnerwork">Partnerwork</option>
                <option value="footwork">Footwork</option>
                <option value="styling">Styling</option>
                <option value="body movements">Body movements</option>
                <option value="choreography">Choreography</option>
                <option value="theory">Theory</option>
                <option value="stretching">Stretching</option>
                <option value="mix">Mix</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="col-span-6 sm:col-span-1">
            <label for="day" class="df-form-label">Location</label>
            <select class="df-form-select form-select" wire:model="location">
                <option value="">All</option>
                @foreach (\App\Models\Classroom::all() as $item)
                <option value="{{ $item->id }}">{{ $item->name }} {{ $item->location->city }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <section class="mt-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
            @foreach ($courses as $course)
            <a href="{{ route('courses.view', $course->slug ) }}">
                {{-- @auth --}}
                <livewire:catalogue.course-card2 :course="$course" :user="auth()->user()" />
                {{-- @else --}}
                {{-- <x-catalogue.course-card :course="$course" /> --}}
                {{-- @endauth --}}
            </a>
            @endforeach
        </div>
    </section>
</div>