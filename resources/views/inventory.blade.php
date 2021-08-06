<div class="bg-lightblue pt-5 pb-10 px-20 flex flex-col h-full">
    <x-navbar name="{{ auth()->user()->name }}" gold="{{auth()->user()->gold }}" point="{{auth()->user()->actual_points}}"
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
            <div class="w-full h-1/2 mt-10">
                <h2>Items (Click to use and view detail)</h2>
                <div class="flex min-h-0 mt-1 w-10/12 overflow-x-scroll h-72 scrollbar-custom">
                    <div class="flex flex-nowrap">
                        @foreach($items as $item)
                            <x-item-inventory :itemsInvent="$itemsInvent" :item="$item"/>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

        <!-- Achievement-->
        <div class="flex flex-col w-5/12 h-full rounded-xl">
            <h2 class="pl-4">Achievement</h2>
            <div class="flex-1 flex flex-col w-full px-4 overflow-y-auto scrollbar-custom text-xl">
                @foreach($achievements as $achievement)
                    <x-achievements-inventory :achievement="$achievement" :achievementInvent="$achievementInvent"/>
                @endforeach
            </div>
        </div>
    </div>

</div>
<script src="{{ asset('js/useItem.js') }}"></script>
<script>

    $(".aMaterial").hover(function(){
        let curID = $(this).attr('id');
        let detail = $("#det_" + curID);
        let img = $("#image_" + curID);
        giveTransitionHover(detail,1);
        giveTransitionHover(img,0);
    })


    function giveTransitionHover(elem, onoff){
        if(onoff === 1){
            elem.toggleClass('hidden');
        }

        elem.toggleClass('transition');
        elem.toggleClass('duration-300');
    }

</script>
