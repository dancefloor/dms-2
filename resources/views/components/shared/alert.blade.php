<div>
    @if (session()->has('success'))
    <div x-data="{ open: true }" x-show="open">
        <!--Header Alert-->
        <div class="alert-banner w-full mb-10">
            <label
                class="close cursor-pointer flex items-center justify-between w-full py-4 px-5 bg-green-400 rounded text-white font-bold"
                title="close" for="banneralert">
                {{ session()->get('success') }}
                <button type="button" @click="open = false">
                    @include('icons.x', ['style'=>'w-3'])
                </button>
            </label>
        </div>
    </div>
    @endif
</div>