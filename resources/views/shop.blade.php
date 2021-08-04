<div class="bg-lightblue pt-5 pb-10 px-20 w-full min-h-screen">
    <x-navbar name="Test" gold="{{auth()->user()->gold }}" point="{{auth()->user()->actual_points}}"
              pageTitle="Marketplace"/>

    <h2> Items </h2>
    <div class="flex flex-row overflow-x-auto my-3">
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

<script>
    $(()=>{
        $(".mtl-detail").hover(imageHover);
        $(".item-detail").hover(itemImageHover);
        $(".detail-btn").click(openMaterialDetail);
        $(".item-detail-btn").click(openItemDetail);
        $("#content").click(closeDetail);

    })
    function openMaterialDetail(){
        let curID = $(this).attr("id");
        let mtlID = curID.substring(7);

        openDetail('shop/materialDetail', mtlID);
    }

    function openItemDetail(){
        let curID = $(this).attr("id");
        let itemID = curID.substring(12);

        openDetail('shop/itemDetail', itemID);
    }

    function openDetail(theURL, theID){
        $.ajax({
           url:theURL,
           method:'post',
           data:{
               id: theID
           }
        }).done(function(response){
            $("#modal").append(response);
            $("#content").toggleClass("opacity-50");
            $("#modal").toggleClass("hidden");
        });
    }

    function closeDetail(){
        let content = $("#content");
        let modal = $("#modal");
        if(modal.children().length > 0){
            modal.html("");
            content.toggleClass("opacity-50");
            modal.toggleClass("hidden");
        }
    }

    function imageHover(){
        let curID = $(this).attr("id");
        $("#image-"+curID).toggleClass("opacity-50");
    }

    function itemImageHover(){
        let curID = $(this).attr("id");
        curID = curID.substr(5);
        $("#item-image-"+curID).toggleClass("opacity-50");
    }

    function buyMaterialFromShopCard(theBuyBtn){
        let mtlID = $(theBuyBtn).attr('id').substr(4);
        let mtlName = $("#name-"+mtlID).html();
        let mtlPrice = $("#price-"+mtlID).html();
        mtlPrice = mtlPrice.replace(' G', '');
        buyItems(1, mtlID, mtlName, mtlPrice, 'material');
    }

    function buyMaterialFromModal(){
        buyFromModal('material');
    }

    function buyItemFromModal(){
        buyFromModal('item');
    }

    function buyFromModal(type){
        let substrIdx;
        if(type === "material") substrIdx = 13;
        else substrIdx = 9;
        let qty = $("#number-input").val();
        let theID = $(".buyBtn").attr("id");
        theID = theID.substr(substrIdx);
        let theName = $("#" + type + "-name-modal").text();
        let thePrice = $("#" + type + "-price-modal").text();
        thePrice = thePrice.replace(" G", "");
        buyItems(qty, theID, theName, thePrice, type);
    }

    function buyItemFromShopCard(theBuyBtn){
        let itemID = $(theBuyBtn).attr('id').substr(8);
        let itemName = $("#itemname-" + itemID).html();
        let itemPrice = $("#itemprice-" + itemID).html();
        itemPrice = itemPrice.replace(' G', '');

        buyItems(1, itemID, itemName, itemPrice, 'item');
    }

    function buyItems(qty, theID, materialName, materialPrice, type){
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
                            url: '/shop/buyGoods',
                            method: 'post',
                            data: {
                                purchasableID: theID,
                                materialQty: qty,
                                totalPrice: total,
                                type: type
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

    function updateGoldAndPoints(){
        $.ajax({
            url:'updateGoldAndPoints',
            method:'post'
        }).done(function(response){
            $("#gap").html(response);
        });
    }
</script>





