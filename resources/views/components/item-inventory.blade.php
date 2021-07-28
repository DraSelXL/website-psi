<div id="{{$item->id}}" name="{{$item->name}}" desc="{{$item->description}}"
    class="flex flex-row h-1/12 w-1/2 bg-white my-1.5 text-black p-2 mr-3
    rounded-xl font-bold text-base bg-darkblue transform transition-all duration-300 hover:scale-y-105 itemButton">
    <img class="h-full w-3/12 rounded-xl " src="{{ asset('images/image0.jpg') }}" alt="a">
    <p class="mt-8 pl-7 h-8 center text-white text-2xl">{{$item->name}}</p>
    <p class="mt-8 ml-3 text-yellow-300 text-2xl">x {{$itemQuantity}}</p>
</div>
