@props(['item'])

<div class="bg-darkblue p-3 font-bold rounded text-white w-3/12 m-3">
    <div class="flex flex-row">
        <div class="flex flex-col w-60 h-60">
            <div class="">
                <img src="{{ asset('images/image0.jpg') }}" alt="">
            </div>
            <div class="text-2xl my-5 text-center">
                {{ $item->price }} G
            </div>
        </div>

        <div class="flex flex-col w-full m-3">
            <div class="text-2xl text-center">
                {{ $item->name }}
            </div>
            <div class="overflow-y-auto h-32 my-2">
                {{ $item->description }}
            </div>
            <div>
                <button class="rounded-xl text-white bg-themegreen w-full font-bold text-xl mt-2 h-10 hover:bg-green-400 transform hover:scale-110 duration-300">
                    BUY
                </button>
            </div>
        </div>
    </div>
</div>
