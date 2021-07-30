@props(['materials'])

<div class="flex flex-row p-5 h-1/5 mt-7">
    @foreach($materials as $material)
        <x-formreward-single-material :material="$material"></x-formreward-single-material>
    @endforeach
</div>
