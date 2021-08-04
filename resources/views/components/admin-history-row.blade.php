@props(['row', 'rowNo'])

<tr class="my-1 text-center {{ $row->log->type == 1 ? 'bg-themegreen' : 'bg-themered' }}">
    <td class="p-3">{{ $rowNo }}</td>
    <td class="p-3">{{ $row->team->name }}</td>
    <td class="p-3">{{ $row->log->message }}</td>
    <td class="p-3">{{ $row->log->date_in }}</td>
</tr>
