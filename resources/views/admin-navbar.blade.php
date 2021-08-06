<div class="fixed" id="navbar-space">
    <div class="w-4 absolute inset-y-5 left-3 h-5 z-50">
        <button id="hamburger-btn">
                <span class="text-2xl text-themeyellow">
                    <i class="fas fa-bars"></i>
                </span>
        </button>
    </div>
    <div class="bg-darkblue w-64 min-h-screen absolute inset-y-0 left-0 relative
            transform -translate-x-52 transition duration-300 ease-in-out overflow-hidden" id="the-navbar">
        <div class="p-5">
            <a href="/" id="psi-2021" class="hidden">
                <div class="font-bold text-3xl text-themered mb-6 ml-14">PSI 2021</div>
            </a>
        </div>
        <nav id="navbar-items" class="hidden text-white">
            <x-sidebar-item>
                <x-slot name="btnname">
                    post-game-btn
                </x-slot>
                <x-slot name="navname">
                    Post-Game Input
                </x-slot>
            </x-sidebar-item>
            <x-sidebar-item>
                <x-slot name="btnname">
                    leaderboard-btn
                </x-slot>
                <x-slot name="navname">
                    Leaderboard
                </x-slot>
            </x-sidebar-item>
            <x-sidebar-item>
                <x-slot name="btnname">
                    team-stats-btn
                </x-slot>
                <x-slot name="navname">
                    Team Stats
                </x-slot>
            </x-sidebar-item>
            <x-sidebar-item>
                <x-slot name="btnname">
                    team-history-btn
                </x-slot>
                <x-slot name="navname">
                    Team History Logs
                </x-slot>
            </x-sidebar-item>
            <x-sidebar-item>
                <x-slot name="btnname">
                    misc-btn
                </x-slot>
                <x-slot name="navname">
                    Miscellaneous
                </x-slot>
            </x-sidebar-item>
            <x-sidebar-item>
                <x-slot name="btnname">
                    manual-input
                </x-slot>
                <x-slot name="navname">
                    Manual Input
                </x-slot>
            </x-sidebar-item>
        </nav>
        <div class="absolute bottom-0 left-0 w-full h-10  ">
            <button id="logout-btn" class="bg-themered text-white font-bold w-full h-10 text-center hidden">
                <i class="fas fa-sign-out-alt"></i> Log Out
            </button>
        </div>
    </div>
</div>

