 <div class="mb-5">
        <div class="bg-themegreen max-w-2xl mx-auto border border-gray-200 static rounded hover:bg-green-300 focus:bg-green-300 transition duration-300" x-data="{selected:null}">
            <ul class="shadow-box">
                <li class="relative border-b border-gray-200">

                    <button type="button" class="w-full px-8 py-6 text-left"
                            @click="selected !== 1 ? selected = 1 : selected = null">
                        <div class="flex flex-row ">
                            <div class="h-16 w-16">
                                <img src="{{ asset('images/image0.jpg') }}" alt=""></div>
                            <div class="text-lg font-bold py-1 ml-10 flex flex-col">
                                <div >
                                    {{ $achievement->name }}
                                </div>
                                <div>
                                    {{ $achievement->points }} pts
                                </div>
                            </div>
                        </div>
                    </button>
                    <button id="{{ $achievement->id }}" class="absolute bg-darkblue rounded w-24 h-10 text-white right-5 top-8 font-bold text-lg focus:ring-2 focus:ring-themeyellow hover:bg-blue-500 hover:border-themered transform hover:scale-110 duration-300 craft-btn"
                    >
                        Craft
                    </button>

                    <div class="relative overflow-hidden transition-all max-h-0 duration-700 flex flex-wrap" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                        @foreach($achievementRecipe($achievement) as $recipe)
                            <x-recipe :material="$getMaterial($recipe->material_id)"
                                      :qty="$recipe->material_qty">
                            </x-recipe>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
