@php
    $ringColor = '';
    if($material->rarity == 1)
        $ringColor .= 'from-green-500 to-darkblue';
    elseif ($material->rarity == 2)
        $ringColor .= 'from-blue-500 to-darkblue';
    elseif ($material->rarity == 3)
        $ringColor .= 'from-purple-600 to-darkblue';
    else
        $ringColor .= 'from-gradyellow via-gradyellowmid to-gradyellowto ';


@endphp

<div class="flex flex-row h-20 p-2 mb-5 font-bold text-lg rounded items-center justify-between
 bg-gradient-to-br {{ $ringColor }} ">

    <img src="{{ $material->src }}" class="w-16 h-full rounded-md" alt="">

    <div class="flex-1 px-5 text-white">
        {{ $material->name }}
    </div>
    <div class="text-white">
        x
        @foreach($materialQty($material) as $qty)
            {{ $qty->material_qty }}
        @endforeach
    </div>
</div>
