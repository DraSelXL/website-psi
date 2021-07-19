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

<div class="flex flex-row bg-deepblue font-bold w-72 ml-8 my-3 rounded ring {{ $ringColor }}">
    <div class="w-12 h-12">
        <img src="{{ asset('images/image0.jpg') }}" alt="">
    </div>
    <div class="py-3 ml-8">
        {{ $material->name }}
    </div>
        <div class="flex-1 text-right pr-5 py-3 bg-purple">
            x{{ $qty }}
        </div>
</div>


