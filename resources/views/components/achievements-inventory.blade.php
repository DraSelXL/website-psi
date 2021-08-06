    <div
    class="flex fw-full h-20 bg-white my-1.5 p-2 rounded-lg font-semibold
    bg-darkblue text-white justify-between items-center">
    <div class="w-2/12"><img class="rounded-lg w-16 h-full" src="{{ $achievement->src }}"></div>
    <div class="flex-1 px-5">{{$achievement->name}}</div>
    <div class="w-2/12 h-full"><p class="mt-3">x {{$achQuantity}}</p></div>
</div>
