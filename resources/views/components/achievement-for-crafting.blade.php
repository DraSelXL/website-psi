 <div class="mr-8 font-bold">

        <div class="bg-themegreen max-w-xl mx-auto border border-gray-200 static" x-data="{selected:null}">
            <ul class="shadow-box">

                <li class="relative border-b border-gray-200">

                    <button type="button" class="w-full px-8 py-6 text-left"
                            @click="selected !== 1 ? selected = 1 : selected = null">
                        <div class="flex flex-row ">
                            <div class="h-12 w-12">
                                <img src="{{ asset('images/image0.jpg') }}" alt=""></div>
                            <div>
                                Joe Who?
                            </div>
                        </div>
                    </button>
                    <button class="absolute bg-darkblue rounded w-10 h-6 text-white right-5 top-8">
                        Craft
                    </button>

                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                        AAAAAAAAAAAAAAA
                    </div>
                </li>
            </ul>
        </div>
    </div>
