@props(['item'])

<div class="p-1 text-white w-1/4 max-h-60 xl:max-h-72 shadow">
    <div class="flex flex-col bg-darkblue p-3 rounded-xl h-full">
        <div class="relative">
            <img id="item-image-{{ $item->id }}" src="{{ asset('images/image0.jpg') }}" class="overflow-hidden rounded-md h-36 w-full flex-1">
            <div id = "item-{{ $item->id }}" class="item-detail absolute opacity-0 top-0 w-full h-full flex flex-wrap content-center px-24 hover:opacity-100 transition duration-300">
                <button id="item-detail-{{ $item->id }}" class="item-detail-btn rounded-full border-4 border-themegreen font-bold w-72 hover:underline transform hover:scale-110 transition duration-300">
                    Detail
                </button>
            </div>
        </div>


        <div class="text-lg xl:text-xl text-center font-bold">
            {{ $item->name }}
        </div>
        <div class="xl:text-lg my-1 text-center">
            {{ $item->price }} G
        </div>

        <button
            class="rounded-lg text-white bg-themegreen w-full font-bold text-lg
            mt-2 py-1 hover:bg-green-400 transform hover:scale-110 duration-300">
            BUY
        </button>
    </div>
</div>
