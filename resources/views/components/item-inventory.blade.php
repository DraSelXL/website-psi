

    <div class="rounded-full h-36 w-36 aMaterial mt-5 mr-1 itemButton"
         id="{{$item->id}}" name="{{$item->name}}" desc="{{$item->description}}" effect="{{$item->effect}}" qty="{{$itemQuantity}}">
        <img src="{{ asset('images/roxy.jpg') }}" alt="" class="border-4 mtl-img object-fill rounded-full h-36 border-blue-900"
             id="image_{{$item->id}}">
        <div class="font-bold bottom-0 w-full hidden mtl-detail" id="det_{{$item->id}}">
            <div class="text-center w-full">
                {{ $item->name }}
            </div>
            <div id="i_{{$item->id}}" class="text-center w-full item-qty">
                x {{ $itemQuantity }}
            </div>
        </div>
    </div>


