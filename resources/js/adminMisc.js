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

$("#finish-btn").on("click", finishGame);

function finishGame(){
    $.confirm({
        title : '',
        useBootstrap : false,
        boxWidth : '400px',
        type : 'orange',
        content : `
        <div class="text-6xl text-center text-yellow-400 my-4">
            <i class="fas fa-question-circle"></i>
        </div>
        <div class="text-xl text-center font-bold">
            Are You Sure?
        </div>
        `,
        buttons : {
            yes:{
                text: 'Hell Yes!',
                btnClass: 'btn-green',
                action: function(){
                    $.ajax({
                        url:'admin/finishGame',
                        method:'post'
                    }).done(function (response){
                        if(response == 1){
                            $.alert({
                                title : '',
                                useBootstrap : false,
                                boxWidth : '400px',
                                type : 'green',
                                content : `
                                <div class="text-6xl text-center text-themegreen my-4">
                                    <i class="fas fa-flag-checkered"></i>
                                </div>
                                <div class="text-xl text-center font-bold">
                                    Game Finished!
                                </div>`
                            })
                        }
                    })
                }
            },
            no: {
                text: 'Hell No!',
                btnClass : 'btn-red'
            }
        }
    })
}
