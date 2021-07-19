<div class="bg-lightblue p-10">
    <span class="font-bold text-black text-4xl">
        Crafting
    </span>
    <div class="flex flex-row mt-10">
        <div class="w-8/12 h-screen p-10 overflow-auto">
            <div>
                <x-search-bar barId="keyword" btnId="searchBtn"></x-search-bar>
                <div id="materials">
                    @include('crafting-material-list')
                </div>
            </div>
        </div>
        <div class="w-full h-screen overflow-auto">
            <div class="font-bold text-center">
                Tip: You can click on each achievement's bar to view its recipe
            </div>
            @foreach($achievements as $achievement)
                <x-achievement-for-crafting :achievement="$achievement"
                                            :achievementMtls="$achievementMtls"></x-achievement-for-crafting>
            @endforeach
        </div>
    </div>
</div>

<script src="{{ asset('js/achievement-crafting.js') }}"></script>
