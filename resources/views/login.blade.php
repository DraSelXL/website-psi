<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-deepblue">
    <div class="text-7xl text-themered text-right w-full font-bold pr-6">
        PSI
    </div>
    <div class="bg-lightblue max-w-lg mx-auto p-8 md:p-12 my-52 rounded-lg shadow-2xl">
        <section class="mt-10">
            <form class="flex flex-col" method="get" action="login">
                @csrf
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" >Username</label>
                    <input type="text"
                           id="username"
                           name="username"
                           class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-themegreen transition duration-500 px-3 pb-3">
                    @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" >Password</label>
                    <input type="password"
                           id="password"
                           name="password"
                           class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-themegreen transition duration-500 px-3 pb-3">
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <button class="bg-themegreen hover:bg-green-500 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Login</button>
            </form>
        </section>
    </div>
</body>
</html>
