<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<div class="">
    <button class="bg-themegreen mr-0 h-7 w-8 rounded-l-md" onclick="minus()">
        <i class="fas fa-minus"></i>
    </button>
    <input type="number" value="1" min="1" class="h-7 w-10 text-gray-600 font-bold text-center -mx-1 mt-0.5" id="number-input">
    <button class="bg-themegreen mr-0 h-7 w-8 rounded-r-md" onclick="add()">
        <i class="fas fa-plus"></i>
    </button>
</div>
<script>
    function add(){
        let numberInput = $("#number-input");
        let val = numberInput.val();
        val++;
        numberInput.val(val);
    }

    function minus(){
        let numberInput = $("#number-input");
        let val = numberInput.val();
        if(val > 1)
            val--;
        numberInput.val(val);
    }
</script>
