$(".itemButton").on("click",function(){
    console.log($(this).attr("desc"));

    let desc = $(this).attr("desc");
    let fx = '(Usage effect: '+ $(this).attr("effect")+')'
    let title = $(this).attr("name") ;
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
                text: 'Yes',
                btnClass: 'btn-green',
                action: function(){

                }
            },
            no: {
                text: 'No',
                btnClass : 'btn-red'
            }
        }
    })
})
