<div class="bg-themegreen relative font-bold text-xl rounded-lg my-3 h-1/5 p-3 flex flex-row text-black">
    <div>
        <img src="{{ $achievement->src }}" alt="" class="h-16 w-20">
    </div>
    <div class="mx-3 w-full">
        <div class="relative">
            {{ $achievement->name }}
            <div class="absolute right-0 bottom-0">
                {{ $achievement->points }} pts
            </div>
        </div>
        <div class="text-base my-3 relative w-full">
            Missing material: {{ $missingMtl->name }}
            <div class="absolute right-0 bottom-0">
                <button id="subs-{{ $missingMtl->id }}"
                    class="bg-darkblue text-themeyellow font-bold h-6 w-24 text-sm
                text-center rounded-lg subs-btn
                transform hover:scale-110 hover:bg-blue-700 hover:text-white transition duration-300">Substitute</button>
            </div>
        </div>
    </div>
</div>


