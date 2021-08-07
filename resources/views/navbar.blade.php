<div class="fixed" id="navbar-space">
    <div class="w-4 absolute inset-y-5 left-3 h-5 z-50">
        <button id="hamburger-btn">
                <span class="text-2xl text-themeyellow">
                    <i class="fas fa-bars"></i>
                </span>
        </button>
    </div>
    <div class="bg-darkblue w-64 min-h-screen absolute inset-y-0 left-0
            transform -translate-x-52 transition duration-300 ease-in-out overflow-hidden" id="the-navbar">
        <div class="p-5">
            <a href="/" id="psi-2021" class="hidden">
                <div class="font-bold text-3xl text-themered mb-6 ml-14">PSI 2021</div>
            </a>
        </div>
        <nav id="navbar-items" class="hidden text-white">
            <x-sidebar-item>
                <x-slot name="btnname">
                    home-btn
                </x-slot>
                <x-slot name="navname">
                    Home
                </x-slot>
            </x-sidebar-item>
            <x-sidebar-item>
                <x-slot name="btnname">
                    shop-btn
                </x-slot>
                <x-slot name="navname">
                    Shop
                </x-slot>
            </x-sidebar-item>
            <x-sidebar-item>
                <x-slot name="btnname">
                    inven-btn
                </x-slot>
                <x-slot name="navname">
                    Inventory
                </x-slot>
            </x-sidebar-item>
            <x-sidebar-item>
                <x-slot name="btnname">
                    history-btn
                </x-slot>
                <x-slot name="navname">
                    History Log
                </x-slot>
            </x-sidebar-item>
            <x-sidebar-item>
                <x-slot name="btnname">
                    achievement-btn
                </x-slot>
                <x-slot name="navname">
                    Claim Achievement
                </x-slot>
            </x-sidebar-item>
            <x-sidebar-item>
                <x-slot name="btnname">
                    stats-btn
                </x-slot>
                <x-slot name="navname">
                    Stats
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
            <div class="absolute bottom-0 left-0 w-full h-10  ">
                <form action="logout" method="get">
                    <button type="submit" id="logout-btn" class="bg-themered text-white font-bold w-full h-10 text-center hidden">
                        <i class="fas fa-sign-out-alt"></i> Log Out
                    </button>
                </form>
            </div>
        </nav>
    </div>
</div>

