<div class="bg-lightblue pt-5 pb-10 px-20 w-full min-h-screen">
    <x-navbar name="Test" gold="{{auth()->user()->gold }}" point="{{auth()->user()->points}}"
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
        if(modal.children().length > 0){
            modal.html("");
            content.toggleClass("opacity-50");
        }
    }

    function imageHover(){
        let curID = $(this).attr("id");
        $("#image-"+curID).toggleClass("opacity-50");
    }

    function buyItemFromShopCard(theBuyBtn){
        let mtlID = $(theBuyBtn).attr('id').substr(4);
        let mtlName = $("#name-"+mtlID).html();
        let mtlPrice = $("#price-"+mtlID).html();
        mtlPrice = mtlPrice.replace(' G', '');
        buyItems(1, mtlID, mtlName, mtlPrice);
    }

    function buyItemFromModal(){
        let qty = $("#number-input").val();
        let materialID = $(".buyBtn").attr("id");
        materialID = materialID.substr(4);
        let materialName = $("#material-name-modal").text();
        let materialPrice = $("#material-price-modal").text();
        materialPrice = materialPrice.replace(" G", "");
        buyItems(qty, materialID, materialName, materialPrice);
    }

    function buyItems(qty, materialID, materialName, materialPrice){
        let total = materialPrice * qty;

        let sentence = 'Do you really want to buy ' + qty + ' ' + materialName + '(s) for ' + total + ' G?'

        $.confirm({
            title : '',
            useBootstrap : false,
            boxWidth : '400px',
            type : 'blue',
            content : `
<div class="text-6xl text-center text-blue-400 my-4">
    <i class="fas fa-shopping-cart"></i>
</div>
<div class="text-xl text-center font-bold">
    Are You Sure?
</div>
<div class="text-lg modal-content">

</div>
`,
            onContentReady: function(){
                $(".modal-content").html(sentence);
            },
            buttons : {
                yes:{
                    text: 'Yes',
                    btnClass: 'btn-green',
                    action: function(){
                        $.ajax({
                            url: '/shop/buyMaterial',
                            method: 'post',
                            data: {
                                materialID: materialID,
                                materialQty: qty,
                                totalPrice: total
                            }
                        }).done(function(response){
                            if(response === "1"){
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
                                                   Transaction Succeed!
                                               </div>
                                               <div class="text-lg text-center">
                                                   Come again next time! :)
                                               </div>`
                                })
                                closeDetail();
                                updateGoldAndPoints();
                            }else{
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
                                                   Insufficient Amount of Gold!
                                               </div>
                                               <div class="text-lg text-center">
                                                   You don't have enough gold to purchase the items.
                                               </div>
                                               <div class="missing-gold font-bold">
                                               </div>`,
                                    onContentReady : function(){
                                        let amount = parseInt(response);
                                        amount *= -1;
                                        $(".missing-gold").html('Missing amount of gold: ' + amount + ' G');
                                    }
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
        })
    }
</script>



