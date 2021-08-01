<div class="h-full flex flex-wrap content-center items-center flex-col">
    <div class="font-bold text-xl text-center my-5">
        Team Leaderboards
    </div>

    <table class="w-full text-center">
        <tr class="bg-themegreen">
            <th class=" w-1/5 p-5">Position</th>
            <th class=" w-1/5 p-5">Team</th>
            <th class=" w-1/5 p-5">Points</th>
            <th class=" w-1/5 p-5">Actual Points</th>
            <th class=" w-1/5 p-5">Gold</th>
        </tr>
        @foreach($teams as $team)
            <x-admin-leaderboard-row :team="$team" :position="$loop->iteration"></x-admin-leaderboard-row>
        @endforeach
    </table>
</div>
