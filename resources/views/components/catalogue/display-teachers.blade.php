<div>
    @if (count($course->teachers) > 0)
    <section id="teachers-list">
        @if ($course->teachers->count() < 3) <section id="teachers">
            @foreach ($course->teachers as $teacher)
            <div id="teacher" class="inline-flex items-center mr-2 my-2">
                <img src="{{$teacher->profile_photo_url}}" alt="" class="w-8 rounded-full">
                <span class="truncate ml-1 text-sm text-600">{{ $teacher->name }}</span>
            </div>
            @endforeach
    </section>
    @else
    <div class="inline-flex items-center mr-2 my-2">
        <img src="{{ asset('images/dancefloor-logo-black.png')}}" alt="" class="w-8 rounded-full">
        <span class="truncate ml-1">Dancefloor Team</span>
    </div>
    @endif
    </section>
    @endif
</div>