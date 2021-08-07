<div class="z-50 w-full h-full bg-darkblue p-5 text-white rounded overflow-y-auto">

    <div class="text-3xl absolute right-5 top-4">
        <button class="close-btn text-themeyellow transform hover:scale-125 transition duration-300">
            <i class="far fa-times-circle"></i>
        </button>
    </div>


    @if(count($rows) > 0)
        <div class="text-white font-bold text-center text-2xl">
            Substitutable Materials
        </div>
        @foreach($rows as $row)
            <x-missingsubs-detail class="blade" :achievement="$row->achievement" :missingMtl="$row->missingMtl"></x-missingsubs-detail>
        @endforeach
    @else
        <div class="flex justify-center items-center w-full h-full text-center text-2xl font-bold">
            <div class="h-1/5">
                No substitutable materials available. <br>
                Collect more materials!
            </div>
        </div>
    @endif
</div>

<script src="{{ asset('js/useItem.js') }}"></script>
