<x-detail-modal type="item" price="{{ $item->price }}" name="{{ $item->name }}"
                description="{{ $item->description }}" purchasableID="{{ $item->id }}"
                buyFunction="buyItemFromModal()">
    <x-slot name="additionalContent">
        <div class="mt-5 font-bold flex flex-row text-md">
            *Note: Only one item of the same kind can remain active. You can't use an item if the same item is still active.
        </div>
    </x-slot>
</x-detail-modal>
