<div class="flex flex-wrap content-center flex-col">
    <div class="text-center font-bold text-2xl">
        Mini Games List
    </div>
    @foreach($mini_games as $game)
        <button id="mini-game-{{ $game->id }}" class="mini-game-btn w-5/12 h-4/5 text-center bg-darkblue text-themeyellow font-bold rounded py-7 text-xl my-2 hover:bg-blue-500 transition duration-300 focus:ring-4 ring-themeyellow">
            {{ $game->name }}
        </button>
    @endforeach
</div>
<script>
    $(()=>{
        $(".mini-game-btn").on("click", function(){
            let gameId = $(this).attr("id");
            gameId = gameId.substr(10);
            $.ajax({
                url:'/admin/postGameInputForm',
                method:'post',
                data:{
                    gameID: gameId
                }
            }).done(function(response){
                $("#content").html(response);
            })
        })
    })
</script>
