@props(['team', 'position'])
@php
    $firstClass = '';
    if($position == 1)
        $firstClass = 'bg-yellow-400 text-white font-bold';
@endphp

<tr class="{{ $firstClass }}">
    <td  class="p-3">{{ $position }}</td>
    <td  class="p-3">{{ $team->name }}</td>
    <td  class="p-3">{{ $team->points }}</td>
    <td  class="p-3">{{ $team->actual_points }}</td>
    <td  class="p-3">{{ $team->gold }}</td>
</tr>
