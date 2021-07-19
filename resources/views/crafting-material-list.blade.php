@foreach($materials as $material)
    <x-material-for-crafting :material="$material"
                             :materialsInventory="$materialsInventories"
                             ></x-material-for-crafting>
@endforeach
