<div class="h-full flex flex-wrap content-center items-center flex-col">
    <div class="font-bold text-xl text-center my-5">
        Team History Logs
    </div>

    <table class="w-full text-center border-separate">
        <tr class="bg-gray-300">
            <th class=" w-1/12 p-5">#</th>
            <th class=" w-3/12 p-5">Team</th>
            <th class=" w-5/12 p-5">Message</th>
            <th class=" w-3/12 p-5">Timestamp</th>
        </tr>
        @foreach($histories as $history)
            <x-admin-history-row :row="$history" :rowNo="$loop->iteration"></x-admin-history-row>
        @endforeach
    </table>
</div>
