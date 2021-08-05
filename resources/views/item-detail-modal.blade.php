<x-detail-modal type="item" price="{{ $item->price }}" name="{{ $item->name }}"
                description="{{ $item->description }}" purchasableID="{{ $item->id }}"
                buyFunction="buyItemFromModal()" :finish="$finish">
    <x-slot name="additionalContent">
    </x-slot>
</x-detail-modal>
