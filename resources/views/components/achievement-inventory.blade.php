@props(['achievement'])

<div class="flex flex-col w-40 h-40 bg-white my-1.5 text-black p-3 rounded-3xl font-bold text-base self-center content-center">
    <div class="justify-center rounded-3xl w-full h-7/12">
        <img class="w-full h-full" src="{{ asset('images/image0.jpg') }}" alt="{{$achievement->name}}" title="{{$material->name}}">
    </div>
    <div class="w-1/12 h-1/3 self-center" style="margin-top:-4px">
        <p class="h-10/12">{{$material->id}}</p>
    </div>

</div>
