@php
    $ringColor = '';
    if($material->rarity == 1)
        $ringColor .= 'bg-green-500 ';
    elseif ($material->rarity == 2)
        $ringColor .= 'bg-blue-500 ';
    elseif ($material->rarity == 3)
        $ringColor .= 'bg-purple-600 ';
    else
        $ringColor .= 'bg-yellow-400 ';

@endphp

<div class="{{ $ringColor }}flex flex-row h-24 p-3 my-5 font-bold text-lg rounded">
    <div class="w-16 h-10 py-2 ml-2">
        <img src="{{ asset('images/image0.jpg') }}" alt="">
    </div>
    <div class="w-10/12 py-5 pl-5">
        {{ $material->name }}
    </div>
    <div class="py-5">
        x
        @foreach($materialQty($material) as $qty)
            {{ $qty->material_qty }}
        @endforeach
    </div>
</div>
