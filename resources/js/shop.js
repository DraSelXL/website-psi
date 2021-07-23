$(()=>{
    console.log("hei")
    $(".mtl-detail").hover(imageHover);
})

function imageHover(){
    let detail = $(".mtl-detail");
    console.log("hovered")
}

function buyItem(price, id, name) {
    $.confirm({
        title: 'Purchase Confirmation',
        boxWidth: '400px',
        content: 'Are you sure you want to buy ' + name + ' item for ' + price + ' G',
        buttons: {

            cancel: function () {
                $.alert('Canceled!');
            },
            buy: {
                text: 'Buy',
                btnClass: 'btn-blue',
                keys: ['enter'],
                action: function () {
                    $.alert('Done');
                }
            }
        }
    });
    // if(price>{{ auth()->user()->gold }}){
    //     alert('Not enough gold!');
    // }
    // else{
    //     alert('Are you sure you want to '+id+' '+name+' this item for '+price+' G?');
    // }

}
