<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset ('img/logo.png') }}">
    <title>Register | Quiz Play</title>
</head>

<body class="bg-gradient-to-r bg-blue-2F308B">
    
    <section class="flex min-h-full items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-max">

            @include('errors.message')
        
            <div style="background-color: blue;" class=" shadow-lg border border-gray grid grid-cols-1 md:grid-cols-2 justify-center items-center gap-2">
                <div class="bg-white">
                    <img src={{asset('img/illus2.png')}} alt="ilustrasi" class="h-auto w-auto">
                </div>
                <div class="px-5 py-2">    
                    <h2 class="py-5 text-center text-3xl font-roboto font-bold tracking-tight text-white">
                        Register
                    </h2>                  
                    <form class="py-2 space-y-6" action="{{ url('/register') }}" method="POST" onsubmit="return confirmSubmit()" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="remember" value="true">
                        <div class="space-y-2 rounded-full shadow-sm">
                            <div>
                                <label for="name" class="sr-only">Name</label>
                                <input value="{{ old('name') }}" id="name" name="name" type="text" required class="relative block w-full rounded-full border-0 py-1.5 text-black-1E1E1E placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-gray-300" placeholder="Name">
                            </div>
                            <div>
                                <label for="username" class="sr-only">Username</label>
                                <input value="{{ old('username') }}" id="username" name="username" type="text" required class="relative block w-full rounded-full border-0 py-1.5 text-black-1E1E1E placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-gray-300" placeholder="Username">
                            </div>
                            <div>
                                <label for="email" class="sr-only">Email</label>
                                <input value="{{ old('email') }}" id="email" name="email" type="email" required class="relative block w-full rounded-full border-0 py-1.5 text-black-1E1E1E placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-gray-300" placeholder="Email">
                            </div>
                            <div>
                               
                                <label for="password" class="sr-only">Password</label>
                                <input value="{{ old('password') }}" id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full rounded-full border-0 py-1.5 text-black-1E1E1E placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-gray-300" placeholder="Password">
                            </div>
                            <div>
                                
                                <label for="password_confirmation" class="sr-only">Re-password</label>
                                <input value="{{ old('password_confirmation') }}" id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password" required class="relative block w-full rounded-full border-0 py-1.5 text-black-1E1E1E placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-gray-300" placeholder="Re-password">
                            </div>
                        </div>
                        <div class="flex space-x-4">
                                <a href="{{ url('/') }}"
                                class="group relative flex items-center justify-center w-full h-12  rounded-full bg-green text-white hover:text-black hover:bg-gray-300 duration-200 shadow shadow-green-200 hover:shadow-gray-300 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-200 hover:border-slate-400 dark:hover:border-slate-500 hover:text-slate-900 dark:hover:text-slate-300 hover:shadow transition duration-150">
                                    Login
                                </a>

                            <button type="submit" class="group relative flex w-full justify-center rounded-full bg-green-400 px-3 py-2 text-sm font-semibold text-white hover:text-black hover:bg-gray-300 duration-200 shadow shadow-green-200 hover:shadow-gray-300 px-4 py-2 border flex gap-2 border-slate-200 dark:border-slate-700 rounded-full text-slate-700 dark:text-slate-200 hover:border-slate-400 dark:hover:border-slate-500 hover:text-slate-900 dark:hover:text-slate-300 hover:shadow transition duration-150">
                                Register
                            </button>
                        </div>
                    </form>
                    <div>
                        <a href="login/google"
                            class="group relative flex w-full justify-center rounded-full bg-green-400 px-3 py-2 text-sm font-semibold text-white hover:text-black hover:bg-gray-300 duration-200 shadow shadow-green-200 hover:shadow-gray-300 px-4 py-2 border flex gap-2 border-slate-200 dark:border-slate-700 rounded-full text-slate-700 dark:text-slate-200 hover:border-slate-400 dark:hover:border-slate-500 hover:text-slate-900 dark:hover:text-slate-300 hover:shadow transition duration-150">
                            <img class="w-6 h-6" src="https://www.svgrepo.com/show/475656/google-color.svg"
                                loading="lazy" alt="google logo">
                            <span>Register with Google</span>
                        </a>
                    </div>
                    
                </div>
            </div>

        </div>
    </section>

    {{ View::make('footer') }}

</body>

{{-- confirmsubmit --}}
<script>
    function confirmSubmit () {
        var r = confirm ('lanjutkan penyimpanan data ?');
        if (r) {
            return true;
        } else {
            return false;
        }
    }
</script>

</html>