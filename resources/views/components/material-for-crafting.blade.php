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

<div class="{{ $ringColor }}flex flex-row h-20 p-2 mb-5 font-bold text-lg rounded items-center justify-between">

    <img src="{{ asset('images/image0.jpg') }}" class="w-16 h-full rounded-md" alt="">

    <div class="flex-1 px-5">
        {{ $material->name }}
    </div>
    <div>
        x
        @foreach($materialQty($material) as $qty)
            {{ $qty->material_qty }}
        @endforeach
    </div>
</div>
