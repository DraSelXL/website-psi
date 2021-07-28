<div class="my-5 flex flex-wrap content-center flex-col relative">
    <div class="font-bold">
        {{ $label }}
    </div>
    <select id="{{ $selectName }}" class="w-10/12 block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
        @foreach($teams as $team)
            <option value="{{ $team->id }}">{{ $team->name }}</option>
        @endforeach
    </select>
    <div class="pointer-events-none absolute top-1/2 right-6 px-2 text-gray-700">
        <i class="fas fa-chevron-down"></i>
    </div>
</div>

