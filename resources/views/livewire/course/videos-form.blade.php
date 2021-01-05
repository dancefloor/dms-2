<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Video Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Copy and Paste the embed code from Youtube or Facebook here.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="updateVideos" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">

                        <x-shared.alert />

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-6">
                                @if ($teaser_video_1)
                                <div class="mb-2">{!! $teaser_video_1 !!}</div>
                                @endif

                                <label for="teaser_video_1" class="df-form-label">Teaser Video 1</label>
                                <textarea wire:model="teaser_video_1" class="form-textarea df-form-textarea"
                                    rows="3"></textarea>
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                @if ($teaser_video_2)
                                <div class="mb-2">{!! $teaser_video_2 !!}</div>
                                @endif
                                <label for="teaser_video_2" class="df-form-label">Teaser video 2</label>
                                <textarea wire:model="teaser_video_2" class="form-textarea df-form-textarea"
                                    rows="3"></textarea>
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                @if ($teaser_video_3)
                                <div class="mb-2">{!! $teaser_video_3 !!}</div>
                                @endif
                                <label for="teaser_video_3" class="df-form-label">Teaser video 3</label>
                                <textarea wire:model="teaser_video_3" class="form-textarea df-form-textarea"
                                    rows="3"></textarea>
                            </div>


                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <a href="{{ route('courses.view', $course->slug) }}" class="df-btn-secondary">
                            View
                        </a>
                        <button class="df-form-btn">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>