<tr class="text-center text-lg">
    <td class="text-2xl">{{ $position }}</td>
    <td class="text-2xl">{{ $team->name }}</td>
    <td class="text-2xl">{{ $gold }}</td>
    <td>
        <div class="flex items-center justify-center flex-col">
            <img src="{{ $material->src }}" alt="" class="h-32 rounded-full">
            <div>
                {{ $material->name }}
            </div>
        </div>
    </td>
</tr>
