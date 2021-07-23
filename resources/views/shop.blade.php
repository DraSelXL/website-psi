<div class="bg-lightblue pt-5 pb-10 px-20 w-full min-h-screen">
    <x-navbar name="Test" point="{{auth()->user()->gold }}" coin="{{auth()->user()->points}}"
              pageTitle="Marketplace"/>

    <h2> Items </h2>
    <div class="flex flex-row overflow-x-auto my-3 justify-around">
        @foreach($items as $item)
            <x-item-card :item="$item"></x-item-card>
        @endforeach
    </div>
    <h2> Materials </h2>
    <div class="flex flex-wrap justify-around">
        @foreach($materials as $material)
            <x-material-card :material="$material"/>
        @endforeach
    </div>

</div>

{{--<script src="{{ asset('js/shop.js') }}"></script>--}}
<script>
    $(()=>{
        $(".mtl-detail").hover(imageHover);
        $(".detail-btn").click(openDetail);
        $("#content").click(closeDetail);
    })

    function openDetail(){
        let curID = $(this).attr("id");
        let itemID = curID.substring(7);

        $.ajax({
           url:'shop/materialDetail',
           method:'post',
           data:{
               id: itemID
           }
        }).done(function(response){
            $("#modal").append(response);
            $("#content").toggleClass("opacity-50");
        });
    }

    function closeDetail(){
        let content = $("#content");
        let modal = $("#modal");
        console.log();
        if(modal.children().length > 0){
            modal.html("");
            content.toggleClass("opacity-50");
        }
    }

    function imageHover(){
        let curID = $(this).attr("id");
        $("#image-"+curID).toggleClass("opacity-50");
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
</script>



