<button @click="slideOver = true"
    class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out"
    aria-label="Notifications">
    <span class="inline-flex items-center">
        @include('icons.basket')
        <span class="font-bold">{{ $count }}</span>
    </span>
</button>