@props(['bgColor', 'owned'])

<div class="font-bold w-1/2 p-4 ">
    <div class="h-full w-full relative">
        <div class="flex flex-row bg-deepblue  rounded overflow-hidden
        bg-gradient-to-r {{ $bgColor }}">
            <img src="{{ $material->src }}" alt="" class="w-10 h-10 m-2">
            <div class="py-3 pl-8">
                {{ $material->name }}
            </div>
            <div class="flex-1 text-right pr-5 py-3 bg-purple">
                x{{ $qty }}
            </div>
        </div>
        <div class="bg-black {{ $owned == 1 ? 'opacity-0' : 'opacity-50' }} w-full h-full absolute left-0 top-0 ">
        </div>
    </div>
</div>


