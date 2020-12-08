<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!--
        Background overlay, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
        <!--
        Modal panel, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div>
                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                        How to get your facebook profile url
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm leading-5 text-gray-500 mb-3">
                            We need your facebook profile because our facebook private group is currently the easiest
                            and more convinient way for us to
                            communicate and share our content with with you and all our students.
                        </p>
                        <video width="100%" controls>
                            <source src="{{ asset('fb-profile-url.mp4')}}" type="video/mp4">
                            Your browser does not support HTML video.
                        </video>
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-6">
                <span class="flex w-full rounded-md shadow-sm">
                    <button type="button" @click="showInfo = !showInfo"
                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-700 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Go back
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>