@props(['material'])

<div class="w-80 h-96 bg-darkblue flex-col text-white p-3 m-5 rounded-3xl text-2xl font-bold">
    <div class="flex flex-col justify-center rounded-3xl">
        <img class="w-72 h-40" src="{{ asset('images/image0.jpg') }}" alt="">
    </div>
    <div class="my-2 text-center">
        {{ $material->name }}
    </div>
    <div class="text-sm h-28">
        {{ $material->description }}
    </div>
    <div class="flex flex-row">
        <div class="flex-grow text-center pt-1">{{ $material->price }} G</div>
        <div class="flex-grow flex justify-center">
            <button class="bg-themegreen font-bold h-10 w-32 rounded-xl hover:bg-green-500 transform hover:scale-110 transition duration-300">
                BUY
            </button>
        </div>
    </div>
</div>
