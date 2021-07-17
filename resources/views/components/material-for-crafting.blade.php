<div class="bg-themegreen flex flex-row h-24 p-3 my-5 font-bold text-lg">
    <div class="w-16 h-10 py-2 ml-2">
        <img src="{{ asset('images/image0.jpg') }}" alt="">
    </div>
    <div class="w-10/12 py-5 pl-5">
        {{ $material->name }}
    </div>
    <div class="py-5">
        x{{ $materialQty($material)[intval($idx)]->material_qty ?? 'Bruh moment'}}
    </div>
</div>
