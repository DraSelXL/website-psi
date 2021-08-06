<nav class="h-10 flex justify-between">
    <h1>
        {{ $pageTitle  }}
    </h1>
    <div class="flex h-10">
        <div id="active-items" class="mr-10 px-5 py-0.5 rounded-xl bg-darkblue text-themeyellow center">
            Active Items :

        </div>
        <div class="mr-10 px-5 py-0.5 rounded-xl bg-darkblue text-themeyellow center">
            Game State :
            <div id="game-state" class=""></div>
        </div>
        <div id="gap" class="mr-10 px-5 py-0.5 rounded-xl bg-darkblue text-themeyellow center">

            {{$gold}}G, {{$point}}pts
        </div>
        <div class="center font-semibold">
            Hi, Team {{$name}}
        </div>
    </div>
</nav>

<script src="{{ asset('js/useItem.js') }}"></script>
