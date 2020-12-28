<!-- Main Footer -->
<footer class="bg-gray-900 text-white py-10">
    <div class="container mx-auto my-10">
        <div class="flex flex-wrap -mx-3 my-1 items-center">
            <div class="w-full md:w-1/3 px-3 my-1">
                {{-- <a href="{{ route('welcome') }}"> --}}
                <div class="flex justify-center md:justify-start">
                    <a href="/">
                        @include('icons.logo-white',['style'=>'h-16'])
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-3 my-1 inline-flex text-center">
                <div class="flex justify-center w-full">
                    <div>
                        <a href="https://www.facebook.com/DancefloorGeneva/" target="_blank"
                            class="bg-blue-700 rounded-full p-3 text-white hover:bg-blue-800 mx-2 inline-flex">
                            @include('icons.social.facebook')
                        </a>
                    </div>

                    <div>
                        <a href="https://twitter.com/DancefloorGe" target="_blank"
                            class="bg-blue-400 rounded-full p-3 text-white hover:bg-blue-500 mx-2 inline-flex">
                            @include('icons.social.twitter')
                        </a>
                    </div>
                    <div>
                        <a href="https://www.youtube.com/channel/UCPHPIzyomTiHI9uRuRfbsLQ" target="_blank"
                            class="bg-red-700 rounded-full p-3 text-white hover:bg-red-800 mx-2 inline-flex">
                            @include('icons.social.youtube')
                        </a>
                    </div>

                    <div>
                        <a href="https://www.instagram.com/dancefloor_studio_/" target="_blank"
                            class="text-white bg-pink-700 rounded-full inline-flex p-3 hover:bg-pink-800 mx-2 inline-flex">
                            @include('icons.social.instagram')
                        </a>
                    </div>
                </div>

            </div>
            <div class="w-full md:w-1/3 px-3 my-1">
                <div class="flex justify-center md:justify-end">
                    <div class="text-center md:text-right">
                        <div>
                            <a href="mailto:online@dancefloorgva.com"
                                class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out inline-flex">
                                @include('icons.email')
                                online@dancefloorgva.com
                            </a>
                        </div>
                        <div>

                            <a href="tel:+41 78 657 50 56"
                                class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out inline-flex">@include('icons.phone')
                                +41 78 657 50 56</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto text-center">
        <a href="" class="text-sm text-gray-600 hover:underline">Terms and Conditions</a><span class="text-gray-600"> -
        </span><a href="" class="text-sm text-gray-600 hover:underline">Privacy policy</a>
        <br>
        <br>
        <strong class="text-xs my-2 text-gray-600">Copyright © {{ Date('Y') }} <a href="#">Dancefloor</a>. All rights
            reserved.</strong>
    </div>
</footer>