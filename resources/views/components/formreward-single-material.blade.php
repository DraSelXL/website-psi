@props(['material'])

@php
    $bordercolor = ['border-green-500', 'border-blue-500', 'border-purple-600', 'border-yellow-400'];
@endphp
<div class="rounded-full h-32 w-32 mx-4 relative aMaterial overflow-hidden"
     id="{{ $material['position'] }}-{{ $material['material']->id }}">
    <img src="{{ $material['material']->src }}" alt="" class="mtl-img object-fill w-full h-32 rounded-full
    border-4 {{ $bordercolor[$material['material']->rarity-1] }}"
         id="img-{{ $material['position'] }}-{{ $material['material']->id }}">
    <div class="font-bold absolute bottom-0 w-full hidden mtl-detail"
         id="detail-{{ $material['position'] }}-{{ $material['material']->id }}">
        <div class="text-center w-full">
            {{ $material['material']->name }}
        </div>
        <div class="text-center w-full">
            {{ $material['percentage'] . ' %' }}
        </div>
    </div>
</div>
