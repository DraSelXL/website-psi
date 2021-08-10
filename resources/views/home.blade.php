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
            <img src="{{asset('images/PSI Logo Transparent.png')}}" class="h-full w-full">
        </div>
        <div class="grid grid-cols-3 w-1/2 h-full ml-7">
            <div class="rounded-xl bg-darkblue w-11/12 h-5/6 flex flex-col justify-center text-8xl text-yellow-400 p-3"
                onclick="window.open('https://docs.google.com/document/d/1WUwUR1_2pwsZuhEWBtVsWPX13VdpL_bG/edit?usp=sharing&ouid=111240697777757406566&rtpof=true&sd=true');" style="cursor: pointer;">
                <center><i class="fas fa-book"></i>
                <div class="text-2xl mt-3">Buku Pengenalan Studi Informatika 2021</div></center>

            </div>
            <div class="rounded-xl bg-darkblue w-11/12 h-5/6 flex flex-col justify-center text-8xl text-yellow-400 p-3"
                 onclick="window.open('https://drive.google.com/file/d/19hTLyrUQdoM8vjh93fEA_8gR0vQRrFcn/view?usp=sharing');" style="cursor: pointer;">
                <center><i class="fas fa-dice"></i>
                    <div class="text-2xl mt-3">Panduan Rally Games PSI</div></center>
            </div>
            <div class="rounded-xl bg-darkblue w-11/12 h-5/6 flex flex-col justify-center text-8xl text-yellow-400 p-3"
                 onclick="window.open('https://drive.google.com/file/d/19hTLyrUQdoM8vjh93fEA_8gR0vQRrFcn/view?usp=sharing');" style="cursor: pointer;">
                <center><i class="fas fa-bomb"></i>
                    <div class="text-2xl mt-3">Panduan Rally Mini Games</div></center>
            </div>
            <div class="rounded-xl bg-darkblue w-11/12 h-5/6 flex flex-col justify-center text-8xl text-yellow-400 p-3"
                 onclick="window.open('https://drive.google.com/file/d/19hTLyrUQdoM8vjh93fEA_8gR0vQRrFcn/view?usp=sharing');" style="cursor: pointer;">
                <center><i class="fas fa-box-open"></i>
                    <div class="text-2xl mt-3">Item List & Guide</div></center>
            </div>
            <div class="rounded-xl bg-darkblue w-11/12 h-5/6 flex flex-col justify-center text-8xl text-yellow-400 p-3"
                 onclick="window.open('https://docs.google.com/presentation/d/1_NavHXwOeqjQrJqt-NYBZpaRfMJpYJox/edit?usp=sharing&ouid=111240697777757406566&rtpof=true&sd=true');" style="cursor: pointer;">
                <center><i class="fas fa-bookmark"></i>
                    <div class="text-2xl mt-3">User Web Manual</div></center>
            </div>
            <div class="rounded-xl w-11/12 h-5/6 flex flex-col justify-center text-8xl text-yellow-400 p-3">
                <img src="{{ asset('images/ISTTS.png') }}">
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/useItem.js') }}"></script>


