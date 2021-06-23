<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Extra Information</h3>
                <p class="mt-1 text-sm leading-5 text-gray-600">
                    Complete related information
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('courses.update', $course) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6">
                                <label for="styles" class="df-form-label">Styles</label>
                                <select id="styles" name="styles[]" class="form-select df-form-select" multiple>
                                    @foreach (\App\Models\Style::all() as $style)
                                    <option value="{{ $style->id }}"
                                        {{ $course->hasStyle($style->id) ? 'selected' : ''}}>
                                        {{ $style->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-6">
                                <label for="teachers" class="df-form-label">Teachers</label>
                                <select id="teachers" name="teachers[]" class="form-select df-form-select" multiple>
                                    @foreach (\App\Models\User::all() as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $course->hasTeacher($item->id) ? 'selected' : ''}}>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="classroom"
                                    class="block text-sm font-medium leading-5 text-gray-700">Classroom</label>
                                <select id="classroom" name="classroom" class="form-select df-form-select">
                                    <option value=""></option>
                                    @foreach (\App\Models\Classroom::all() as $classroom)
                                    <option value="{{ $classroom->id }}"
                                        {{ $course->classroom_id == $classroom->id ? 'selected' : ''}}>
                                        {{ $classroom->name }} ({{ $classroom->location->name }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <fieldset class="col-span-6">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="standby" name="standby" type="checkbox"
                                            class="form-checkbox df-form-checkbox" value="1"
                                            {{ $course->standby == 1 ? 'checked':''}}>
                                    </div>
                                    <div class="ml-3 text-sm leading-5">
                                        <label for="standby" class="font-medium text-gray-700">
                                            Standby list?
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="status" class="df-form-label">Status</label>
                                <select id="status" name="status" class="form-select df-form-select">
                                    <option value="active" {{ $course->status == 'active' ? 'selected':''}}>
                                        Active
                                    </option>
                                    <option value="finished" {{ $course->status == 'finished' ? 'selected':''}}>
                                        Finished
                                    </option>
                                    <option value="draft" {{ $course->status == 'draft' ? 'selected':''}}>
                                        Draft
                                    </option>
                                    <option value="billable" {{ $course->status == 'billable' ? 'selected':''}}>
                                        Billable
                                    </option>
                                </select>
                            </div>

                            <div class="col-span-6">
                                <label for="students" class="df-form-label">Students</label>
                                <select id="students" name="students[]" class="form-select df-form-select" multiple>
                                    <option value=""></option>
                                    @foreach (\App\Models\User::all() as $item)
                                    <option value="{{ $item->id }}" {{ $course->hasStudent($item->id) ? 'selected':''}}>
                                        {{ $item->name }} {{ $item->lastname }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="df-form-btn">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('modals')
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#teachers").select2();
            $("#styles").select2();
            $("#students").select2();
        });
    </script>
    @endpush
</div>