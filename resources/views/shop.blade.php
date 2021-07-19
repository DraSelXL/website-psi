<div class="bg-lightblue p-10">
    <span class="font-bold text-black text-4xl">
        Marketplace
    </span>
    <div class="h-14 w-96 bg-darkblue rounded-xl my-5 text-white font-bold p-2">
        <div class="flex flex-row">
            @auth
                <div class="flex-grow text-xl my-1 text-center">{{ auth()->user()->gold }} G</div>
                <div class="flex-grow text-xl my-1 text-center">{{ auth()->user()->points }} pts</div>
            @endauth
        </div>
    </div>
    <div class="font-bold text-black text-3xl">
        Materials
    </div>
    <div class="flex flex-wrap justify-evenly">
        @foreach($materials as $material)
            <x-material-card :material="$material" />
        @endforeach
    </div>
    <div class="font-bold text-black text-3xl">
        Items
    </div>
    <div class="flex flex-row overflow-x-auto bg-gray-300">
        @foreach($items as $item)
            <x-item-card :item="$item"></x-item-card>
        @endforeach
    </div>
</div>



