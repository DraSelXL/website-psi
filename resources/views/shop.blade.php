<div class="bg-blue-500 p-10 flex flex-wrap justify-evenly">
    @foreach($materials as $material)
        <x-material-card :material="$material" />
    @endforeach
</div>
