@php
    $rarity = ['Normal', 'Rare', 'Super Rare', 'Ultra Rare'];
    $color = ['text-green-500', 'text-blue-500', 'text-purple-600', 'text-yellow-400'];

@endphp

<x-detail-modal type="material" price="{{ $material->price }}" name="{{ $material->name }}"
                description="{{ $material->description }}" purchasableID="{{ $material->id }}"
                buyFunction="buyMaterialFromModal()" :finish="$finish">
    <x-slot name="additionalContent">
        <div class="mt-5 font-bold flex flex-row">
            Rarity:
            <div class="ml-2 {{ $color[$material->rarity - 1] }}">
                {{ $rarity[$material->rarity - 1] }}
            </div>
        </div>
    </x-slot>
</x-detail-modal>



