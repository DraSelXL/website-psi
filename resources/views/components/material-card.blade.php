@props(['material'])

<div class="w-48 h-56 xl:w-72 xl:h-80 mb-12 py-3 shadow">
    <div class="bg-darkblue flex flex-col text-white p-3 rounded-xl">
        <img class="w-full h-4/6 overflow-hidden rounded-md" src="{{ asset('images/image0.jpg') }}" alt="">
        <div class="h-1/6">
            <div class="my-1 text-center font-bold text-lg xl:text-2xl">
                {{ $material->name }}
            </div>
            {{--        <div class="text-sm text-center">--}}
            {{--            {{ $material->description }}--}}
            {{--        </div>--}}
        </div>

        <div class="flex flex-row h-1/6 w-full flex justify-between items-center mt-2">
            <div class="text-center pt-1">{{ $material->price }} G</div>

            <button
                class="bg-themegreen font-bold text-lg px-4 rounded-lg hover:bg-green-500 transform hover:scale-110 transition duration-300"
                onclick="buyItem({{$material->price}}, {{$material->id}}, '{{$material->name}}')">
                BUY
            </button>
        </div>
    </div>
</div>
