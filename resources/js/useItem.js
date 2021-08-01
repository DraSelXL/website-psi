$(".itemButton").on("click",function(){
    console.log($(this).attr("desc"));

    let desc = $(this).attr("desc");
    let fx = '(Usage effect: '+ $(this).attr("effect")+')'
    let title = $(this).attr("name") ;

    let id = $(this).attr("id");
    let name = $(this).attr("name");
    let effect = $(this).attr("effect");
    let qty = $(this).attr("qty");
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
                                                   Reminder: You can't use another boost item if another item is still active!
                                               </div>`
                            });
                            updateGoldAndPoints();
                            $(".item-qty").html("x "+qty);
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
                                                   Another boost type item is still active...
                                               </div>`
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
