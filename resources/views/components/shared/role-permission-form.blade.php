<div class="mt-6 sm:mt-5">
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Name
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs">
                <input id="name" name="name" value="{{ $model->name ?? old('name') }}"
                    class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
            </div>
        </div>
    </div>

    <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="slug" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Slug
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs">
                <input id="slug" name="slug" disabled value="{{ $model->slug ?? old('slug') }}"
                    class="form-input bg-gray-100 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
            </div>
        </div>
    </div>

    <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="label" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Label
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-lg rounded-md shadow-sm">
                <input id="label" name="label" type="text" value="{{ $model->label ?? old('label') }}"
                    class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
            </div>
        </div>
    </div>

</div>