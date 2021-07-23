@php
    $ringColor = '';
    if($material->rarity == 1)
        $ringColor = 'ring-green-500';
    elseif ($material->rarity == 2)
        $ringColor = 'ring-blue-500';
    elseif ($material->rarity == 3)
        $ringColor = 'ring-purple-600';
    else
        $ringColor = 'ring-yellow-400';
@endphp

<div class="font-bold w-1/2 p-4">
    <div class="flex flex-row bg-deepblue  rounded ring overflow-hidden {{ $ringColor }}">
        <img src="{{ asset('images/image0.jpg') }}" alt="" class="w-14 h-full">
        <div class="py-3 pl-8">
            {{ $material->name }}
        </div>
        <div class="flex-1 text-right pr-5 py-3 bg-purple">
            x{{ $qty }}
        </div>
    </div>
</div>


