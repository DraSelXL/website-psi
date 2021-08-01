$("#save-btn").on("click", function(){
    console.log($("#useItemCB").val())
    console.log($("#freezeCB").val())
    $.ajax({
        url:'admin/saveMisc',
        method:'post',
        data:{
            use_item:$("#useItemCB").val(),
            freeze_leaderboard: $("#freezeCB").val()
        }
    }).done(function(response){
        if(response === '1'){
            $.confirm({
                title : '',
                useBootstrap : false,
                boxWidth : '400px',
                type : 'green',
                content : `
<div class="text-6xl text-center text-themegreen my-4">
    <i class="fas fa-check-circle"></i>
</div>
<div class="text-xl text-center font-bold">
    Changes saved!
</div>
`,
                buttons:{
                    ok:{

                    }
                }
            })
        }
    })
})
