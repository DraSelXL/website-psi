@props(['item'])

<div class="p-1 text-white w-1/4 max-h-60 xl:max-h-72 shadow">
    <div class="flex flex-col bg-darkblue p-3 rounded-xl  h-full">
        <img src="{{ asset('images/image0.jpg') }}" alt="" class="overflow-hidden rounded-md w-full flex-1">
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
