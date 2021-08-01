@props(['no','row'])
<tr class="text-center">
    <td class="p-3">{{ $no }}</td>
    <td class="p-3">{{ $row->team->name }}</td>
    @foreach($row->stats['teamStats'] as $stats)
        <td class="p-3 {{ $row->stats['color'][$loop->iteration-1] }}">{{ $stats->qty }}</td>
    @endforeach
</tr>
