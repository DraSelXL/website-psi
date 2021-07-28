@props(['percentage'])

<div class="flex flex-row">
    <div>
        <img src="{{ asset('images/solitudeEminor.png') }}" alt="">
    </div>
    <div class="text-center ">
        {{ $percentage . '%' }}
    </div>
</div>
