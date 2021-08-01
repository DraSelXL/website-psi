@props(['checkboxID', 'originalValue'])

<div class="relative inline-block w-12 mr-2 toggle-switch">
    <input value="{{ $originalValue }}" type="checkbox" onclick="toggle(this)" id="{{ $checkboxID }}"
           class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer {{ $originalValue == 'on' ? 'right-0 border-themegreen' : ''}}"/>
    <label onclick="toggle(this)"
           class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer {{ $originalValue == 'on' ? 'bg-themegreen' : ''}}"></label>
</div>

<script>
    function toggle(elem){
        if($(elem).hasClass('toggle-checkbox')){
            toggleCB($(elem));
            $(elem).siblings().toggleClass('bg-themegreen');
        }else if($(elem).hasClass('toggle-label')){
            toggleCB($(elem).siblings());
            $(elem).toggleClass('bg-themegreen');
        }
    }

    function toggleCB(cb){
        cb.toggleClass('right-0');
        cb.toggleClass('border-themegreen');
        if(cb.val() === 'off') cb.val('on');
        else cb.val('off');
    }
</script>
