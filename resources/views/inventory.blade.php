<div class="bg-lightblue pt-5 pb-10 px-20 flex flex-col h-screen">
    <x-navbar name="Test" point="{{auth()->user()->gold }}" coin="{{auth()->user()->points}}"
              pageTitle="Inventory"/>

    <div class="flex flex-row justify-between w-full mt-5 h-5/6">

        <!--Material-->
        <div class="flex flex-col w-7/12">
            <h2>Materials</h2>
            <div class="flex flex-wrap min-h-0 mt-1 w-full">
                @foreach($materialsInventories as $materialinvent)
                    <x-material-inventory :materialinvent="$materialinvent"/>
                @endforeach
            </div>
        </div>


        <!-- Achievement-->
        <div class="flex flex-col w-5/12 h-full rounded-xl pl-5">
            <h2>Achievement</h2>
            <div class="flex-1 flex flex-col w-full content-center overflow-y-auto">
                @foreach($achievements as $achievement)
                    <x-achievements-inventory :achievement="$achievement" :achievementInvent="$achievementInvent"/>
                @endforeach
            </div>
        </div>
    </div>

</div>
