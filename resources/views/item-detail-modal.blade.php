<x-detail-modal type="item"
                :object="$item"
                buyFunction="buyItemFromModal()" :finish="$finish">
    <x-slot name="additionalContent">
    </x-slot>
</x-detail-modal>
