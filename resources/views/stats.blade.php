<div class="bg-lightblue px-20 pt-5 pb-10 h-screen w-full">
    <x-navbar name="Test" gold="{{auth()->user()->gold }}" point="{{auth()->user()->points}}"
              pageTitle="Stats"/>

    <div class="flex justify-center flex-col mt-10">
        <div class="font-bold text-3xl">
            Team {{ auth()->user()->name }}'s Stats
        </div>
        <table class="text-center table-auto mt-5">
            <tr>
                <th class="text-lg w-96">Stat's Category</th>
                <th class="text-lg w-36">Quantity</th>
            </tr>
            @foreach($stats as $stat)
                <tr>
                    <td class="border-2 border-darkblue py-3 px-5 text-md w-96">{{ $stat->stat_item }}</td>
                    <td class="border-2 border-darkblue py-3 px-5 text-md w-36">{{ $stat->qty }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
