<div class="bg-lightblue p-10">
    <span class="font-bold text-black text-4xl">
        Inventory
    </span>
    <div class="h-14 w-96 bg-darkblue rounded-xl my-5 text-white font-bold p-2">
        <div class="flex flex-row">
            @auth
                <div class="flex-grow">{{ auth()->user()->gold }}</div>
                <div class="flex-grow">{{ auth()->user()->points }}</div>
            @endauth
        </div>

    </div>

    <div class="flex flex-col w-7/12 h-50 bg-green-300 rounded-xl content-center">
        <span class="flex-1 font-bold text-black text-4xl p-1 w-full">
                <center>Materials</center>
        </span>
        <div class="flex-1 flex flex-wrap justify-evenly w-full overflow-y-scroll content-center">
            @foreach($materials as $material)
                <x-material-inventory :material="$material" />
            @endforeach
        </div>
    </div>
</div>
