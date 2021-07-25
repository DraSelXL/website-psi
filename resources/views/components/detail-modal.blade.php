<div class="z-50 fixed top-52 left-1/3 w-4/12 h-3/6 bg-darkblue p-5 text-white rounded">
    <div class="flex flex-row">
        <div class="flex flex-col w-64">
            <div class="my-6">
                <img src="{{ asset('images/roxy.jpg') }}" alt="">
            </div>
            <div id="{{ $type }}-price-modal" class="font-bold text-3xl text-center">
                {{ $price }} G
            </div>
            <div class="text-center font-bold mt-5">
                Quantity
            </div>
            <div class="ml-10 my-2 flex flex-row">
                <div>
                    <x-input-number></x-input-number>
                </div>
            </div>
        </div>
        <div class="flex flex-col mt-1 mx-4 w-8/12">
            <div id="{{ $type }}-name-modal" class="text-2xl font-bold text-center">
                {{ $name }}
            </div>
            <div class="my-5 ">
                <span class="font-bold text-lg">
                    Description:
                </span>
                <br>
                <p class="mt-3 text-sm">
                    {{ $description }}
                </p>
            </div>
            {{ $additionalContent }}

        </div>
        <div class="text-3xl">
            <button class="text-themeyellow transform hover:scale-125 transition duration-300" onclick="closeDetail()">
                <i class="far fa-times-circle"></i>
            </button>
        </div>

        <div class="absolute bottom-5 left-1/2">
            <button id="buy-{{ $type }}-{{ $purchasableID }}" onclick="{{ $buyFunction }}" class="buyBtn font-bold text-xl bg-themegreen w-40 h-7 rounded transform hover:scale-110 transition duration-300">
                BUY
            </button>
        </div>
    </div>
</div>
