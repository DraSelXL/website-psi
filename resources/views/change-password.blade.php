<div class="bg-lightblue pt-5 pb-10 px-20 flex flex-col h-screen">
    <x-navbar name="{{ auth()->user()->name }}" gold="{{auth()->user()->gold }}" point="{{auth()->user()->actual_points}}"
              pageTitle="Change Password"/>


        <div class="mr-auto ml-auto bg-lightblue w-1/3 xl:w-1/4 p-4 md:p-8 xl:p-12 mt-7 rounded-lg shadow-2xl mt-auto mb-auto">
            <section class="mt-5">

                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label class="block text-gray-700 text-sm font-bold mb-2 ml-3">New Password</label>
                        <input type="password"
                               id="newPass"
                               name="newPass"
                               class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-themegreen transition duration-500 px-3 pb-3">

                    </div>
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <label class="block text-gray-700 text-sm font-bold mb-2 ml-3">Confirm New Password</label>
                        <input type="password"
                               id="confNewPass"
                               name="confNewPass"
                               class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-themegreen transition duration-500 px-3 pb-3">

                    </div>
                    <button id="btnChangePass"
                        class="bg-themegreen hover:bg-green-500 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 w-full"
                        >Change Password
                    </button>

            </section>
        </div>

</div>

<script>
    $("#btnChangePass").on("click",function(){
        let newPass = document.getElementById("newPass").value;
        let confNewPass = document.getElementById("confNewPass").value;
        $.ajax({
            url: 'changePassword/changePass',
            method: 'post',
            data: {
                newPass: newPass,
                confNewPass: confNewPass
            }
        }).done(function (response) {
            if (response == "-1") {
                $.alert({
                    title: '',
                    type: 'red',
                    boxWidth: '400px',
                    useBootstrap: false,
                    content: `
                                               <div class="text-6xl text-center text-red-500 my-4">
                                                   <i class="fas fa-exclamation"></i>
                                               </div>
                                               <div class="text-xl text-center font-bold">
                                                   Password change failed!
                                               </div>
                                               <div class="text-lg text-center">
                                                   Password confirmation does not match!
                                               </div>`
                });
            } else {
                $.alert({
                    title: '',
                    type: 'green',
                    boxWidth: '400px',
                    useBootstrap: false,
                    content: `
                                               <div class="text-6xl text-center text-green-500 my-4">
                                                   <i class="fas fa-check"></i>
                                               </div>
                                               <div class="text-xl text-center font-bold">
                                                   Password Successfully Changed!
                                               </div>
                                               <div class="text-lg text-center">
                                                   Password have been changed just now...
                                               </div>`
                });
            }
        });

    });




</script>
