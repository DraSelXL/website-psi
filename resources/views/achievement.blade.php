<div class="bg-lightblue px-20 pt-5 pb-10 h-screen w-full">
    <x-navbar name="Test" gold="{{auth()->user()->gold }}" point="{{auth()->user()->points}}"
              pageTitle="Achievement"/>
    <div class="flex flex-row mt-10 flex-1 h-5/6">
        <div class="w-4/12 h-full flex flex-col mr-10">
            <x-search-bar barId="keyword" btnId="searchBtn"></x-search-bar>
            <div class="h-full overflow-auto mt-5 px-4 scrollbar-custom">
                <div id="materials">
                    @include('crafting-material-list')
                </div>
            </div>
        </div>
        <div class="w-8/12 h-full flex flex-col">
            <div class="font-bold text-center">
                Tip: You can click on each achievement's bar to view its recipe
            </div>
            <div class="h-full overflow-auto mt-10 px-4 scrollbar-custom">
                @foreach($achievements as $achievement)
                    <x-achievement-for-crafting :achievement="$achievement"
                                                :achievementMtls="$achievementMtls"></x-achievement-for-crafting>
                @endforeach
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/achievement-crafting.js') }}"></script>
