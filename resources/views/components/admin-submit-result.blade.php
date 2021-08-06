<tr class="text-center text-lg">
    <td>{{ $position }}</td>
    <td>{{ $team->name }}</td>
    <td>{{ $gold }}</td>
    <td>
        <div class="flex items-center justify-center flex-col">
            <img src="{{ $material->src }}" alt="" class="h-32 rounded-full">
            <div>
                {{ $material->name }}
            </div>
        </div>
    </td>
</tr>
