<!-- Current: "bg-indigo-800 text-white", Default: "text-indigo-100 hover:bg-indigo-600 hover:bg-opacity-75" -->
<div x-data="{about:false}">
    <button @click="about=!about"
        class="w-full text-white group flex justify-between items-center px-2 py-2 text-sm font-medium rounded-md hover:bg-gray-700 hover:font-semibold">
        <span>About</span>
        <div>
            <span x-show="about" class="text-2xl font-bold">-</span>
            <span x-show="!about" class="text-2xl font-bold">+</span>
        </div>
    </button>
    <div x-show="about" class="ml-5">
        <div>
            <a href="#"
                class="group flex items-center px-2 py-2 font-medium rounded-md text-sm text-white focus:outline-none focus:text-white focus:bg-gray-700 hover:bg-gray-700">
                Our Story
            </a>
            <a href="#"
                class="group flex items-center px-2 py-2 font-medium rounded-md text-sm text-white focus:outline-none focus:text-white focus:bg-gray-700 hover:bg-gray-700">
                Instructors
            </a>
            <a href="#"
                class="group flex items-center px-2 py-2 font-medium rounded-md text-sm text-white focus:outline-none focus:text-white focus:bg-gray-700 hover:bg-gray-700">
                Values
            </a>
        </div>
    </div>
</div>

<div x-data="{styles:false}">
    <button @click="styles=!styles"
        class="w-full text-white group flex justify-between items-center px-2 py-2 text-sm font-medium rounded-md hover:bg-gray-700 hover:font-semibold">
        <span>Styles</span>
        <div>
            <span x-show="styles" class="text-2xl font-bold">-</span>
            <span x-show="!styles" class="text-2xl font-bold">+</span>
        </div>
    </button>
    <div x-show="styles" class="ml-5">
        <div>
            <a href="#"
                class="group flex items-center px-2 py-2 font-medium rounded-md text-sm text-white focus:outline-none focus:text-white focus:bg-gray-700 hover:bg-gray-700">
                Salsa Cubana
            </a>
            <a href="#"
                class="group flex items-center px-2 py-2 font-medium rounded-md text-sm text-white  focus:outline-none focus:text-white focus:bg-gray-700 hover:bg-gray-700">
                Salsa Porto
            </a>
            <a href="#"
                class="group flex items-center px-2 py-2 font-medium rounded-md text-sm text-white focus:outline-none focus:text-white focus:bg-gray-700 hover:bg-gray-700">
                Hip Hop
            </a>
            <a href="#"
                class="group flex items-center px-2 py-2 font-medium rounded-md text-sm text-white focus:outline-none focus:text-white focus:bg-gray-700 hover:bg-gray-700">
                Fusion
            </a>
        </div>
    </div>
</div>


<a href="{{ route('courses') }}"
    class="text-white hover:bg-gray-700 hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md hover:font-semibold">
    Courses
</a>

<a href="#"
    class="text-white hover:bg-gray-700 hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md hover:font-semibold">
    Pricing
</a>

<a href="#"
    class="text-white hover:bg-gray-700 hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md hover:font-semibold">
    Beginners
</a>

<a href="#"
    class="text-white hover:bg-gray-700 hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md hover:font-semibold">
    Workshops
</a>

<a href="#"
    class="text-white hover:bg-gray-700 hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md hover:font-semibold">
    Events
</a>

<div x-data="{business:false}">
    <button @click="business=!business"
        class="w-full text-white group flex justify-between items-center px-2 py-2 text-sm font-medium rounded-md hover:bg-gray-700 hover:font-semibold">
        <span>Business Services</span>
        <div>
            <span x-show="business" class="text-2xl font-bold">-</span>
            <span x-show="!business" class="text-2xl font-bold">+</span>
        </div>
    </button>
    <div x-show="business" class="ml-5">
        <div>
            <a href="#"
                class="group flex items-center px-2 py-2 font-medium rounded-md text-sm text-white focus:outline-none focus:text-white focus:bg-gray-700 hover:bg-gray-700">
                Private Courses
            </a>
            <a href="#"
                class="group flex items-center px-2 py-2 font-medium rounded-md text-sm text-white focus:outline-none focus:text-white focus:bg-gray-700 hover:bg-gray-700">
                Company Shows
            </a>
            <a href="#"
                class="group flex items-center px-2 py-2 font-medium rounded-md text-sm text-white focus:outline-none focus:text-white focus:bg-gray-700 hover:bg-gray-700">
                Corporate classes
            </a>
        </div>
    </div>
</div>

<a href="#"
    class="text-white hover:bg-gray-700 hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md hover:font-semibold">
    FAQ
</a>
<a href="#"
    class="text-white hover:bg-gray-700 hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md hover:font-semibold">
    Contact
</a>