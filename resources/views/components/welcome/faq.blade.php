<div class="container mx-auto py-10">
    <h2 class="font-bold text-red-700 text-4xl">Frequently Asked Questions</h2>
    <div class="grid grid-cols-2 gap-10 my-8">
        <div class="col-span-2 sm:col-span-1">
            <div x-data="{question:false}" class="bg-gray-50 rounded-md px-3 py-1 my-1">
                <button @click="question = !question" class="w-full flex justify-between items-center">
                    <span class="font-bold text-lg">How and when can I sign up for a class?</span>
                    <div>
                        <span x-show="question" class="text-2xl font-bold">-</span>
                        <span x-show="!question" class="text-2xl font-bold">+</span>
                    </div>
                </button>
                <div x-show="question" class="text-gray-700 text-sm">
                    You can sign up for a class on our website. You will have to register and choose a class through our
                    catalog.
                    <br>
                    You will be able to sign up at the beginning of each session until 6 classes into the session. Each
                    session has 8 courses, once per week.
                </div>
            </div>

            <div x-data="{question:false}" class="bg-gray-50 rounded-md px-3 py-1 my-1">
                <button @click="question = !question" class="w-full flex justify-between items-center">
                    <span class="font-bold text-lg">How do I know which level to take?</span>
                    <div>
                        <span x-show="question" class="text-2xl font-bold">-</span>
                        <span x-show="!question" class="text-2xl font-bold">+</span>
                    </div>
                </button>
                <div x-show="question" class="text-gray-700 text-sm">
                    Our classes have different levels.
                    <br>
                    <b>Beginner:</b> 0 experience in salsa and/or any dance
                    <br>
                    <b>Elementary:</b> 6 months of salsa and/or any dance. You have acquired the basics and you are
                    comfortable
                    with them.
                    <br>
                    <b>Intermediate:</b> 1 year of salsa and /or any dance. You have perfectly acquired the basics and
                    you are able to dance on different rhythms (slow, middle and fast musics).
                    <br>
                    <b>Upper intermediate:</b> 2 year of salsa and/or any dance. You have perfectly acquired the basics,
                    you are able to dance on different rhythms. You know the basics of freestyle, musicality and body
                    movement.
                    <br>
                    <b>Advanced:</b> +3 years of Salsa
                </div>
            </div>

            <div x-data="{question:false}" class="bg-gray-50 rounded-md px-3 py-1 my-1">
                <button @click="question = !question" class="w-full flex justify-between items-center">
                    <span class="font-bold text-lg">How long is a session and a class?</span>
                    <div>
                        <span x-show="question" class="text-2xl font-bold">-</span>
                        <span x-show="!question" class="text-2xl font-bold">+</span>
                    </div>
                </button>
                <div x-show="question" class="text-gray-700 text-sm">
                    A session has 8 classes, one class per week. We have classes of 1h, 1h15, 1h30 and 2h max. The
                    classes are normally the same day at the same time during the year (Changes can happen, if it is the
                    case, it will be notified by your teacher)
                </div>
            </div>

            <div x-data="{question:false}" class="bg-gray-50 rounded-md px-3 py-1 my-1">
                <button @click="question = !question" class="w-full flex justify-between items-center">
                    <span class="font-bold text-lg">I do not live in Geneva or Switzerland, do you have online
                        classes?</span>
                    <div>
                        <span x-show="question" class="text-2xl font-bold">-</span>
                        <span x-show="!question" class="text-2xl font-bold">+</span>
                    </div>
                </button>
                <div x-show="question" class="text-gray-700 text-sm">
                    Yes. You can follow all our online classes juste here <a href="https://dancefloor.online"
                        class="text-red-700 hover:text-red-500 font-bold">Dancefloor
                        Online</a>
                </div>
            </div>

            <div x-data="{question:false}" class="bg-gray-50 rounded-md px-3 py-1 my-1">
                <button @click="question = !question" class="w-full flex justify-between items-center">
                    <span class="font-bold text-lg">I have more questions, who should I contact?</span>
                    <div>
                        <span x-show="question" class="text-2xl font-bold">-</span>
                        <span x-show="!question" class="text-2xl font-bold">+</span>
                    </div>
                </button>
                <div x-show="question" class="text-gray-700 text-sm">
                    If you have more questions about our classes and the studio please do not hesitate to contact us at:
                    <b>dancefloor.geneva@gmail.com</b>
                </div>
            </div>

        </div>
        <div class="col-span-2 sm:col-span-1">
            <img src="{{ asset('images/faq.jpg') }}" alt="">
        </div>
    </div>
</div>