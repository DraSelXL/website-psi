$(()=>{
    $(".craft-btn").click(aNotif)


})

function aNotif(){
    let id = $(this).attr('id')
    $.confirm({
        title:'',
        boxWidth : '400px',
        useBootstrap : false,
        type: 'blue',
        content: `
<div class="text-6xl text-center text-blue-400 my-4">
    <i class="fas fa-exclamation"></i>
</div>
<div class="text-xl text-center font-bold">
    Are You Sure?
</div>
<div class="text-lg">
    Do you really want to craft this achievement?
</div>`,
        buttons: {
            yes: {
                text: 'Yes',
                btnClass: 'btn-green',
                action: function(){
                    $.ajax({
                        url: '/achievement-crafting',
                        method: 'post',
                        data:{
                            achievement_id: id
                        }
                    }).done(function(response){
                        if(response == 0){
                            $.alert({
                                title: '',
                                type: 'red',
                                boxWidth : '400px',
                                useBootstrap : false,
                                content:`
                                    <div class="text-6xl text-center text-red-500 my-4">
                                        <i class="fas fa-times-circle"></i>
                                    </div>
                                    <div class="text-xl text-center font-bold">
                                        Crafting Failed!
                                    </div>
                                    <div class="text-lg">
                                        You don't have enough materials to craft this achievement!
                                    </div>`
                            })
                        }else{
                            $.alert({
                                title: '',
                                type: 'green',
                                boxWidth : '400px',
                                useBootstrap : false,
                                content:`
                                    <div class="text-6xl text-center text-green-500 my-4">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="text-xl text-center font-bold">
                                        Crafting Succeed!
                                    </div>
                                    <div class="text-lg">
                                        Thanks for crafting here mate :)
                                    </div>`
                            })

                            $.ajax({
                                url: "/achievement",
                                method: "get"
                            }).done(function(response){
                                $("#content").html(response);
                            })
                        }
                    })
                }
            },
            no: {
                text: 'No',
                btnClass : 'btn-red'
            }
        }
    });
}



