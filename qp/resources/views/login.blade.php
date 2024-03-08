<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset ('img/logo.png') }}">
    <title>Login | Quiz Play</title>
    <style>
        .parallelogram {
            background-image: url("../img/bg.svg");

            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-blue to-color-F4F2DE parallelogram">

    <section class="flex min-h-full items-center justify-center px-4 py-12 sm:px-6 lg:px-8 h-screen">

        <div class="w-full max-w-max">



            <div style="background-color: blue; box-shadow: -10px -10px 30px 4px rgba(0,0,0,0.1), 10px 10px 30px 4px rgba(45,78,255,0.15);" class=" shadow-lg border border-gray grid grid-cols-1 md:grid-cols-2 justify-center items-center gap-2">
                <div class="bg-white">
                    <img src={{asset('img/wayang.jpg')}} alt="ilustrasi" class="h-100 w-auto">
                </div>
                <div class="px-5 py-5">
                    <h2 class="py-2 text-center text-3xl font-roboto font-bold tracking-tight text-white">
                        Login to Play
                    </h2>
                    @include('errors.message')
                    <form class="py-5 space-y-5" action="{{ url('/') }}" method="POST">
                        @csrf
                        <input type="hidden" name="remember" value="true">
                        <div class="space-y-5 rounded-full shadow-sm">
                            <div>
                                <label for="username" class="sr-only">Username</label>
                                <input id="username" name="username" type="text" required class="relative block w-full rounded-full border-0 py-2 text-black placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 text-black" placeholder="Username">
                            </div>
                            <div>
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full rounded-full border-0 py-2 text-black placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 text-black" placeholder="Password">
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <a href="{{ url('/register') }}" class="group relative flex items-center justify-center w-full h-12  rounded-full bg-green text-white hover:text-black hover:bg-gray-300 duration-200 shadow shadow-green-200 hover:shadow-gray-300 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-200 hover:border-slate-400 dark:hover:border-slate-500 hover:text-slate-900 dark:hover:text-slate-300 hover:shadow transition duration-150">
                                Create Account
                            </a>
                            <button type="submit" class="group relative flex w-full justify-center  rounded-full bg-green-400 px-3 py-2 text-sm font-semibold text-black hover:text-black hover:text-black duration-200 shadow shadow-green-200 hover:shadow-gray-300 px-4 py-2 border flex gap-2 border-slate-200 dark:border-slate-700 rounded-full text-slate-700 dark:text-slate-200 hover:border-slate-400 dark:hover:border-slate-500 hover:text-slate-900 dark:hover:text-slate-300 hover:shadow transition duration-150">
                                Sign in
                            </button>
                        </div>
                    </form>
                    <div>
                        <a href="login/google" class="group relative flex w-full justify-center rounded-full bg-green-400 px-3 py-2 text-sm font-semibold text-black hover:text-black hover:text-black duration-200 shadow shadow-green-200 hover:shadow-gray-300 px-4 py-2 border flex gap-2 border-slate-200 dark:border-slate-700 rounded-full text-slate-700 dark:text-slate-200 hover:border-slate-400 dark:hover:border-slate-500 hover:text-slate-900 dark:hover:text-slate-300 hover:shadow transition duration-150">
                            <img class="w-6 h-6" src="https://www.svgrepo.com/show/475656/google-color.svg" loading="lazy" alt="google logo">
                            <span>Login with Google</span>
                        </a>
                    </div>
                    <!--div>
                        <p class="py-2 text-center text-base tracking-tight text-black">
                            Belum memiliki akun ?
                            <a href="{{ url('/register') }}"
                                class="text-base text-orange-400 hover:opacity-50 duration-200">
                                daftar sekarang
                            </a>
                        </p>
                    </div-->
                </div>
            </div>
            <div class="mx-auto w-full py-2 px-5 ">
                <p class="mx-auto max-w-md text-center text-sm leading-relaxed text-white">
                    Copyright &copy; 2024 by Bayu Traitmojo
                </p>
            </div>

        </div>

    </section>


</body>

</html>