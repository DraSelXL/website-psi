<div class="z-50 w-full h-full bg-darkblue p-5 text-white rounded">
    <div class="flex flex-col w-full h-full">
        <div class="flex flex-row h-5/6">
            <div class="flex flex-col w-1/2">
                <div class="my-6">
                    <img src="{{ $object->src }}" alt="">
                </div>
                <div id="{{ $type }}-price-modal" class="font-bold text-3xl text-center">
                    {{ $object->price }} G
                </div>
            </div>
            <div class="flex flex-col mt-1 mx-4 w-8/12">
                <div id="{{ $type }}-name-modal" class="text-2xl font-bold text-center">
                    {{ $object->name }}
                </div>
                <div class="my-5 ">
                <span class="font-bold text-lg">
                    Description:
                </span>
                    <br>
                    <p class="mt-3 text-sm">
                        {{ $object->description }}
                    </p>
                </div>
                {{ $additionalContent }}

            </div>
            <div class="text-3xl">
                <button class="text-themeyellow transform hover:scale-125 transition duration-300" onclick="closeDetail()">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>
        </div>
        <div class="w-full flex items-center justify-center h-1/6 flex-row">
            @if($finish == 0)
            <x-input-number></x-input-number>
                <div>
                    <button id="buy-{{ $type }}-{{ $object->id }}" onclick="{{ $buyFunction }}" class="buyBtn font-bold text-xl bg-themegreen w-40 h-7 rounded transform hover:scale-110 transition duration-300">
                        BUY
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>

