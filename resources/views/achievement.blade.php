<div class="bg-lightblue p-10">
    <span class="font-bold text-black text-4xl">
        Crafting
    </span>
    <div class="flex flex-row mt-10">
        <div class="w-8/12 h-screen p-10 overflow-auto">
            @foreach($materials as $material)
                <x-material-for-crafting :material="$material"
                                         :materialsInventory="$materialsInventories"
                                         :idx="$loop"></x-material-for-crafting>
            @endforeach
        </div>
        <div class="w-full h-screen overflow-auto">
            @foreach($achievements as $achievement)
                <x-achievement-for-crafting :achievement="$achievement"
                                            :achievementMtls="$achievementMtls"></x-achievement-for-crafting>
            @endforeach
        </div>
    </div>
</div>
