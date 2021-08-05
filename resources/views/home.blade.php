<div class="bg-lightblue pt-5 pb-10 px-20 flex flex-col h-screen">
    <nav class="h-10 flex justify-between">
        <h1>
            Welcome, {{auth()->user()->name}}
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
                {{auth()->user()->gold}}G, {{auth()->user()->actual_points}}pts
            </div>
        </div>
    </nav>
    <div class="flex flex-row mt-14 h-full w-full">
        <div class="w-1/2 h-full rounded-xl bg-darkblue p-10">
            <img src="https://i.ibb.co/Xyr1NYx/makima-cropped.png" class="h-full w-full">
        </div>
        <div class="grid grid-cols-2 w-1/2 h-full ml-7 mt-7">
            @for ($i = 0; $i < 4; $i++)
                <div class="rounded-xl bg-darkblue w-11/12 h-5/6 text-2xl content-center">

                </div>
            @endfor

        </div>
    </div>
</div>

<script src="{{ asset('js/useItem.js') }}"></script>


