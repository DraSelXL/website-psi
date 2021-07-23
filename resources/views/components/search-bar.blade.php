<div class="flex flex-row items-center bg-white rounded-full">
    <input id="{{ $searchBarId }}" type="text"
           class="text-gray-700 leading-tight w-full py-2 px-3 rounded-l-full ml-5 outline-none"
           placeholder="Search something...">
    <div class="p-2">
        <button id="{{ $searchBtnId }}"
                class="bg-darkblue text-white rounded-full w-8 h-8 hover:bg-themegreen transition
                    duration-200 focus:outline-none center">
            <i class="fas fa-search text-xs"></i>
        </button>
    </div>
</div>
