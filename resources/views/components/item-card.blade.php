@props(['item', 'finish'])

<div class="p-1 text-white w-1/6 max-h-60 xl:max-h-72 shadow">
    <div class="flex flex-col bg-darkblue p-3 rounded-xl h-full">
        <div class="relative">
            <img id="item-image-{{ $item->id }}" src="{{ $item->src }}" class="overflow-hidden rounded-md h-36 w-full flex-1">
            <div id = "item-{{ $item->id }}" class="item-detail absolute opacity-0 top-0 w-full h-full flex items-center justify-center hover:opacity-100 transition duration-300">
                <button id="item-detail-{{ $item->id }}" class="item-detail-btn rounded-full border-4 border-themegreen font-bold w-20 hover:underline transform hover:scale-110 transition duration-300">
                    Detail
                </button>
            </div>
        </div>


        <div id="itemname-{{ $item->id }}" class="text-lg xl:text-xl text-center font-bold">
            {{ $item->name }}
        </div>
        <div id="itemprice-{{ $item->id }}" class="xl:text-lg my-1 text-center">
            {{ $item->price }} G
        </div>
        @if($finish == 0)
            <button
                id="buyitem-{{ $item->id }}"
                class="rounded-lg text-white bg-themegreen w-full font-bold text-lg
            mt-2 py-1 hover:bg-green-400 transform hover:scale-110 duration-300"
                onclick="buyItemFromShopCard(this)">
                BUY
            </button>
        @endif

    </div>
</div>
