@props(['material', 'finish'])
@php
    $gradColor = '';
    $colors = [' to-green-500 ', ' to-blue-500 ', ' to-purple-600 ', ' via-gradyellowmid to-gradyellowto '];
    if($material->rarity < 4) $gradColor .= ' from-darkblue ';
    else $gradColor .= ' from-gradyellow ';
    $gradColor .= $colors[$material->rarity-1];
@endphp

<div class="w-48 h-56 xl:w-72 xl:h-80 mb-12 py-3 shadow my-10">
    <div class="bg-gradient-to-br {{ $gradColor }} flex flex-col text-white p-3 rounded-xl">
        <div class="relative">
            <img id = "image-{{ $material->id }}" class="mtl-image w-full h-4/6 overflow-hidden rounded-md transition duration-300" src="{{ $material->src }}" alt="">
            <div id = "{{ $material->id }}" class="mtl-detail absolute opacity-0 top-0 w-full h-full flex items-center justify-center hover:opacity-100 transition duration-300">
                <button id="detail-{{ $material->id }}" class="detail-btn rounded-full border-4 border-themegreen font-bold w-1/2 hover:underline transform hover:scale-110 transition duration-300">
                    Detail
                </button>
            </div>
        </div>


        <div class="h-1/6">
            <div id="name-{{ $material->id }}" class="my-1 text-center font-bold text-lg xl:text-2xl">
                {{ $material->name }}
            </div>
        </div>

        <div class="flex flex-row h-1/6 w-full flex justify-between items-center mt-2">
            <div id="price-{{ $material->id }}" class="text-center pt-1">{{ $material->price }} G</div>
            @if($finish == 0)
                <button
                    id="buy-{{ $material->id }}"
                    class="bg-themegreen font-bold text-lg px-4 rounded-lg hover:bg-green-500 transform hover:scale-110 transition duration-300"
                    onclick="buyMaterialFromShopCard(this)">
                    BUY
                </button>
            @endif
        </div>
    </div>
</div>
