<div class="bg-lightblue pt-5 pb-10 px-20 w-full min-h-screen">
    <x-navbar name="Test" gold="{{auth()->user()->gold }}" point="{{auth()->user()->actual_points}}"
              pageTitle="History"/>
    <div class="bg-lightblue p-5 flex justify-center flex-col py-1 mx-80 h-screen">

        @if($histories->count())
            @foreach($histories as $history)
                <div class="text-xl text-white w-full h-24
                    {{ $history->type  ? 'bg-themegreen' : 'bg-themered' }}
                    my-5 p-3 relative rounded">
                    <div class="mt-5 pl-4">{{ $history->message }}</div>
                    <div class="text-sm right-1 bottom-1 absolute">{{ $history->date_in }}</div>
                </div>
            @endforeach
        @else
            <div class="text-center w-full text-lg font-bold h-full flex items-center justify-center">
                <div>
                    <p class="text-2xl">Wow no histories. Such empty. </p>
                </div>
            </div>
        @endif
    </div>
</div>
