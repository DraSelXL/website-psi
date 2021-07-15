@props(['material'])

<div class="w-80 h-80 bg-darkblue flex-col text-white p-5 m-5 rounded-3xl text-2xl font-bold">
    <div class="flex justify-center rounded-3xl">
        <img class="w-60 h-40" src="../../images/image0.jpg" alt="">
    </div>
    <div class="mt-3 mb-10 text-center">
        {{ $material->name }}
    </div>
    <div class="flex flex-row">
        <div class="flex-grow text-center">{{ $material->price }} G</div>
        <div class="flex-grow flex justify-center">
            <button class="bg-themegreen text-white w-20">
                BUY
            </button>
        </div>
    </div>
</div>
