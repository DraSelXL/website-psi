window.onload=startChecking();
var check;

$("#content").click(closeDetail);

function startChecking(){
    // gameStateCheck();
    // check = setInterval(gameStateCheck,5000);
}
function gameStateCheck(){
    $.ajax({
        url: 'useItem/gameState',
        method: 'post',
    }).done(function(response){
        if(response=="1"){
            document.getElementById("game-state").className = "ml-3 w-4 h-4 bg-green-400 rounded";
        }
        else{
            document.getElementById("game-state").className = "ml-3 w-4 h-4 bg-red-600 rounded";
        }
    });
    $.ajax({
        url: 'useItem/activeItems',
        method: 'post',
    }).done(function(response){
        if(response=="-1"){
            $("#active-items").html("Active Items : - ");
        }
        else{
            let activeItems = JSON.parse(response);
            let sentence = "";
            $("#active-items").html('Active Items : ');
            for(let i=0; i<activeItems.length;i++){
                let id = activeItems[i].item_id;
                //console.log(id);
                $("#active-items").append('<div className="ml-3 h-4 w-auto flex-col"><img class="ml-3 mtl-image w-4 h-4 rounded-md" src="https://i.ibb.co/nC1qqtc/i01-Chainmail.png" alt=""></div>');
                if(i==activeItems.length-1){

                    sentence += id+"";
                }
                else{
                    sentence+=id+", "
                }

            }
        }
    });
}


$(".itemButton").on("click",function(e){
    e.stopImmediatePropagation();
    let desc = $(this).attr("desc");
    let fx = '(Usage effect: '+ $(this).attr("effect")+')'
    let title = $(this).attr("name") ;

    let id = $(this).attr("id");
    let name = $(this).attr("name");
    let effect = $(this).attr("effect");
    let qty = $(this).attr("qty");
    let idp = "i_"+id;

    $.confirm({
        title : '',
        useBootstrap : false,
        boxWidth : '400px',
        type : 'blue',
        content : `
<div class="text-6xl text-center text-blue-400 my-4">
    <i class="fas fa-box-open"></i>
</div>
<div class="text-xl text-center font-bold modal-title">

</div>
<div class="text-lg modal-content">

</div>
`,
        onContentReady: function(){
            $(".modal-content").html(desc);
            $(".modal-title").html(title);
            $(".modal-content").append("<br>");
            $(".modal-content").append(fx);
        },
        buttons : {
            yes:{
                text: 'Use',
                btnClass: 'btn-green',
                action: function(){
                    $.ajax({
                        url: 'useItem/use',
                        method: 'post',
                        data: {
                            itemID:id,
                            itemName:name,
                            itemEffect:effect,
                            itemQty:qty
                        }
                    }).done(function(response){
                        if(response=="1"){
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
                                                   Item Successfully used!
                                               </div>
                                               <div class="text-lg text-center">
                                                   Reminder: You can't activate another boost item while a boost item with the same name is still active.
                                               </div>`
                            });

                            $.ajax({
                                url: 'updateGoldAndPoints',
                                method: 'post'
                            }).done(function (response) {
                                $("#gap").html(response);
                            });

                        }
                        else if(response=="-1"){
                            $.alert({
                                title: '',
                                type: 'red',
                                boxWidth : '400px',
                                useBootstrap : false,
                                content:`
                                               <div class="text-6xl text-center text-red-500 my-4">
                                                   <i class="fas fa-coins"></i>
                                               </div>
                                               <div class="text-xl text-center font-bold">
                                                   You cannot use this item!
                                               </div>
                                               <div class="text-lg text-center">
                                                   The same type of boost cannot be used in the same time!
                                               </div>`
                            })
                        }
                        else if(response=="-2"){
                            $.alert({
                                title: '',
                                type: 'red',
                                boxWidth : '400px',
                                useBootstrap : false,
                                content:`
                                               <div class="text-6xl text-center text-red-500 my-4">
                                                   <i class="fas fa-coins"></i>
                                               </div>
                                               <div class="text-xl text-center font-bold">
                                                   You cannot use this item!
                                               </div>
                                               <div class="text-lg text-center">
                                                   You can not use item in this game state...
                                               </div>`
                            })
                        }
                        else if (response == '7'){
                            $.ajax({
                                url: 'useItem/useMissingSubstitute',
                                method: 'post'
                            }).done(function(response){
                                console.log('mashok')
                                $("#modal").append(response);
                                $("#content").toggleClass("opacity-50");
                            })
                        }
                        else{
                            $.alert({
                                title: '',
                                type: 'red',
                                boxWidth : '400px',
                                useBootstrap : false,
                                content:`
                                               <div class="text-6xl text-center text-red-500 my-4">
                                                   <i class="fas fa-coins"></i>
                                               </div>
                                               <div class="text-xl text-center font-bold">
                                                   You cannot use this item!
                                               </div>
                                               <div class="text-lg text-center">
                                                   You don't have this item. Buy some at the shop...
                                               </div>`
                            })
                        }
                    })
                }
            },
            no: {
                text: 'Cancel',
                btnClass : 'btn-red'
            }
        }
    })
})

$(".subs-btn").on("click", function(){
    let mtlID = $(this).attr('id');
    mtlID = mtlID.substr(5);
    $.ajax({
        url:'useItem/subsMaterial',
        method:'post',
        data:{
            mtlID: mtlID
        }
    }).done(function(response){
        if(response == '1'){
            closeDetail();
            let itemQty = $("#7").attr('qty');
            itemQty--;
            $("#7").attr('qty',itemQty);
            $("#i_7").html("x "+itemQty);
            $.alert({
                title : '',
                useBootstrap : false,
                boxWidth : '400px',
                type : 'green',
                content : `
<div class="text-6xl text-center text-blue-400 my-4">
    <i class="fas fa-box-open"></i>
</div>
<div class="text-xl text-center font-bold modal-title">
    Substituted successfully!
</div>
`,
            })
        }
    })
})

function closeDetail(){
    let content = $("#content");
    let modal = $("#modal");
    if(modal.children().length > 0){
        modal.html("");
        content.toggleClass("opacity-50");
    }
}

