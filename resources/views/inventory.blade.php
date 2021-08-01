<div class="bg-lightblue pt-5 pb-10 px-20 flex flex-col h-screen">
    <x-navbar name="Test" gold="{{auth()->user()->gold }}" point="{{auth()->user()->actual_points}}"
              pageTitle="Inventory"/>

    <div class="flex flex-row justify-between w-full mt-5 h-5/6">

        <div class="flex flex-col w-7/12">
            <!--Material-->
            <div class="flex flex-col w-full">
                <h2>Materials</h2>
                <div class="flex flex-wrap min-h-0 mt-1 w-full">
                    @foreach($materialsInventories as $materialinvent)
                        <x-material-inventory :materialinvent="$materialinvent"/>
                    @endforeach
                </div>
            </div>
            <!--Items-->
            <div class="flex flex-col w-full mt-10">
                <h2>Items</h2>
                <div class="flex flex-wrap min-h-0 mt-1 w-full overflow-y-auto scrollbar-custom">
                    @foreach($items as $item)
                        <x-item-inventory :itemsInvent="$itemsInvent" :item="$item"/>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Achievement-->
        <div class="flex flex-col w-5/12 h-full rounded-xl">
            <h2 class="pl-4">Achievement</h2>
            <div class="flex-1 flex flex-col w-1/2 px-4 overflow-y-auto scrollbar-custom">
                @foreach($achievements as $achievement)
                    <x-achievements-inventory :achievement="$achievement" :achievementInvent="$achievementInvent"/>
                @endforeach
            </div>
        </div>
    </div>

</div>
<script src="{{ asset('js/useItem.js') }}"></script>
