@props(['mtlsInventories'])

<div class="mb-5">
    <div
        class="bg-darkblue text-white max-w-2xl mx-auto border border-gray-200 static rounded transition duration-300"
        x-data="{selected:null}">

        <div class="relative border-b border-gray-200">
            <button type="button" class="w-full p-4 text-left"
                    @click="selected !== 1 ? selected = 1 : selected = null">
                <div class="flex flex-row ">
                    <img src="{{ $achievement->src }}" alt="" class="h-16 w-16">
                    <div class="text-lg font-bold py-1 ml-10 flex flex-col">
                        <div> {{ $achievement->name }} </div>
                        <div> {{ $achievement->points }} pts</div>
                    </div>
                </div>
            </button>

            @if($finish == 0)
                <button id="{{ $achievement->id }}"
                        class="absolute bg-themegreen rounded w-24 h-10 text-white right-5 top-8 font-bold text-lg focus:ring-2 focus:ring-themeyellow hover:bg-green-500 hover:text-themeyellow hover:border-themered transform hover:scale-110 duration-300 craft-btn"
                >Claim
                </button>
            @endif

            <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                 x-ref="container1"
                 x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                <div class="p-4  flex flex-wrap w-full bg-blue-300">
                    @foreach($achievementRecipe($achievement) as $recipe)
                        <x-recipe :material="$getMaterial($recipe->material_id)"
                                  :qty="$recipe->material_qty">
                        </x-recipe>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
