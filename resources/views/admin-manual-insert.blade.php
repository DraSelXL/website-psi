<div class="w-full h-screen flex items-center justify-center bg-themegreen">
    <div class="w-1/4 h-auto bg-blue-300">
        <x-team-select label="Selected Team" selectName="team-select"></x-team-select>
        <x-combobox label="Selected Material" selectName="material-select"
        none="yes" :objects="$materials"></x-combobox>
        <x-combobox label="Selected Item" selectName="item-select"
                    none="yes" :objects="$items"></x-combobox>
        <div class="my-5 flex flex-wrap content-center flex-col font-bold">
            Gold Input <br>
            <input type="number" id="gold" min="0" value="0" class="w-10/12 p-2 rounded-lg">
        </div>
        <div class="my-5 flex flex-wrap content-center flex-col font-bold">
            <button id="submit-btn" class="w-10/12 p-2 rounded-lg bg-darkblue text-themeyellow font-bold hover:bg-blue-600 hover:text-white transition duration-300">
                INSERT
            </button>
        </div>
    </div>
</div>
<script>
    $("#submit-btn").on("click", function(){
        $.ajax({
            url:'admin/manualInsert',
            method:'post',
            data:{
                teamID: $('#team-select').val(),
                materialID: $('#material-select').val(),
                itemID: $('#item-select').val(),
                gold: $('#gold').val()
            }
        }).done(function(response){
            if(response == 1){
                $.alert({
                    title : '',
                    useBootstrap : false,
                    boxWidth : '400px',
                    type : 'green',
                    content : `
                                <div class="text-6xl text-center text-themegreen my-4">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="text-xl text-center font-bold">
                                    Inserted successfully!
                                </div>`
                })
            }else{
                $.alert({
                    title : '',
                    useBootstrap : false,
                    boxWidth : '400px',
                    type : 'red',
                    content : `
                                <div class="text-6xl text-center text-themered my-4">
                                    <i class="fas fa-times-circle"></i>
                                </div>
                                <div class="text-xl text-center font-bold">
                                    Failed Insert Process
                                </div>`
                })
            }
        })
    })
</script>
