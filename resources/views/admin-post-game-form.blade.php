<div class="flex flex-row">
    <div class="w-3/12 h-screen p-7 relative">
        <div class="absolute left-5 top-5">
            <button id="back-btn" class="hover:bg-gray-400 hover:text-white transition duration-300 w-10 h-10 rounded-lg p-2">
                <i class="fas fa-arrow-left"></i>
            </button>
        </div>
        <div class="text-xl text-center font-bold mt-10">
            Position Input
        </div>
        <div class="flex flex-row my-5 text-lg">
            <div id="mini-game-{{ $miniGame->id }}" class="game-name">
                {{ 'Mini Game: ' . $miniGame->name }}
            </div>
        </div>
            <x-team-select label="1st Position" selectName="pos-1"></x-team-select>
            <x-team-select label="2nd Position" selectName="pos-2"></x-team-select>
            <x-team-select label="3rd Position" selectName="pos-3"></x-team-select>
            <x-team-select label="4th Position" selectName="pos-4"></x-team-select>
            <br>
            <button id="submit-btn" class="bg-darkblue text-themeyellow w-full h-10 font-bold rounded-xl hover:bg-blue-500 transition duration-300">Submit</button>

    </div>
    <div class="w-full h-screen p-5">
        <div class="text-center font-bold text-3xl">
            Rewards
        </div>
        <div class="flex flex-row h-5/6 mt-5">

            <div class="w-1/12 ">
                <x-formreward-position pos="1"></x-formreward-position>
                <x-formreward-position pos="2"></x-formreward-position>
                <x-formreward-position pos="3"></x-formreward-position>
                <x-formreward-position pos="4"></x-formreward-position>
            </div>
            <div class="w-2/12">
                @foreach($goldRewards as $goldReward)
                    <x-formreward-gold :qty="$goldReward->qty"></x-formreward-gold>
                @endforeach
            </div>
            <div class="w-9/12">
                @foreach($materialRewards as $mtlReward)
                    <x-formreward-materials :materials="$mtlReward"></x-formreward-materials>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    $(()=>{
        $("#submit-btn").on("click", function(){
            let gameID = $(".game-name").attr("id");
            gameID = gameID.substr(10);
            console.log(gameID);
            $.ajax({
                url :'/submitPostGame',
                method : 'post',
                data:{
                    pos1: $("#pos-1").val(),
                    pos2: $("#pos-2").val(),
                    pos3: $("#pos-3").val(),
                    pos4: $("#pos-4").val(),
                    gameID: gameID
                }
            }).done(function(response){
                $("#content").html(response);
            })
        })


    })
    $(".aMaterial").hover(function(){
        let curID = $(this).attr('id');
        let detail = $("#detail-" + curID);
        let img = $("#img-" + curID);
        giveTransitionHover(detail,1);
        giveTransitionHover(img,0);
    })


    function giveTransitionHover(elem, onoff){
        if(onoff === 1){
            elem.toggleClass('hidden');
            elem.toggleClass('opacity-100');
        }
        else
            elem.toggleClass('opacity-40');

        elem.toggleClass('transition');
        elem.toggleClass('duration-300');
    }

    $("#back-btn").on("click", function(){
        $.ajax({
            url:'admin/postGame',
            method:'get'
        }).done(function(response){
            $("#content").html(response);
        })
    })
</script>
