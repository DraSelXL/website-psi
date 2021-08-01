<div class="h-full flex flex-wrap content-center items-center flex-col">
    <div class="font-bold text-xl text-center my-5">
        Team Stats
    </div>

    <table class="w-full text-center">
        <tr class="bg-themegreen">
            <th class=" w-1/12 p-5">#</th>
            <th class=" w-1/12 p-5">Team</th>
            <th class=" w-1/12 p-5">Items Used</th>
            <th class=" w-1/12 p-5">Mtls/Items Bought</th>
            <th class=" w-2/12 p-5">Achievements Claimed</th>
            <th class=" w-1/12 p-5">Golds Collected</th>
            <th class=" w-1/12 p-5">Mini Games Won</th>
            <th class=" w-2/12 p-5">Pts From Achievement</th>
            <th class=" w-1/12 p-5">Gold From Mini Game</th>
            <th class=" w-1/12 p-5">Gold From Item</th>
        </tr>
        @foreach($rows as $row)
            <x-admin-stats-row :no="$loop->iteration" :row="$row"></x-admin-stats-row>
        @endforeach
    </table>
</div>
