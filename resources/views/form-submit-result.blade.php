<div class="h-full flex flex-wrap content-center flex-col">
    <div class="w-3/4 text-center text-2xl font-bold my-5">
        Result
    </div>
    <table class="w-3/4">
        <tr class="text-2xl">
            <th class="w-1/4">Position</th>
            <th class="w-1/4">Team</th>
            <th class="w-1/4">Gold</th>
            <th class="w-1/4">Material</th>
        </tr>
        @foreach($results as $res)
            <x-admin-submit-result :position="$loop->iteration"
            :team="$res['team']" :gold="$res['gold']" :material="$res['material']"></x-admin-submit-result>
        @endforeach
    </table>
    <div class="flex items-center justify-center my-5 w-3/4">
            <button class="w-1/4 h-10 bg-darkblue text-themeyellow rounded-xl font-bold hover:bg-blue-500 hover:text-white transition duration-300 ok">Okay</button>
    </div>
</div>
<script>
    $(".ok").click(function(){
        $.ajax({
            url:'admin/postGame',
            method:'get'
        }).done(function(response){
            $("#content").html(response);
        })
    })
</script>
