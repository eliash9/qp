<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset ('img/logo.png') }}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <title>Pelajar | Sivaline</title>
    <style>
        /* Style when the radio input is checked */
        input[type="radio"]:checked+label {
            background-color: green;
            /* Change to your desired color */
            color: white;
            /* Change to your desired text color */
            /* Add any other styles you want when checked */
        }

        input[type="radio"].hidden {
            display: none;
        }

        .parallelogram {
            background-image: url({{asset('img/bg.svg')}});
            height: 100%;        
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-color: #0066ff;
        }

        .sti {
            position: -webkit-sticky;
            position: sticky;
            top: 0px;
        }
    </style>
</head>

<body class="bg-gradient-to-r bg-blue-2F308B parallelogram">

    <nav style="background-color:#002233" id="navbar" class="sti flex flex-no-wrap fixed items-center justify-between w-full space-x-4 py-4 px-5 md:px-10 text-lg text-white bg-white mt-0 z-10 top-0">
        <svg xmlns="http://www.w3.org/2000/svg" id="menu-button" class="h-6 w-6 cursor-pointer md:hidden block text-black-1E1E1E shadow-lg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <div class="hidden space-x-4 bg-transparent md:bg-transparent w-full md:flex md:justify-between md:items-center md:w-auto" id="menu">
            <a class="flex items-center no-underline transform duration-200 hover:no-underline hover:opacity-80" href="{{ url('/pelajar') }}">
                <span class="self-center md:text-4xl text-3xl text-blue-1081E8 font-signika font-bold whitespace-nowrap transition-colors duration-300 transform">Sivaline</span>
            </a>
            <ul class="pt-4 md:flex md:justify-between md:pt-0 text-base text-black font-semibold">
                @php
                $menuItems = [

                ['label' => 'Room', 'url' => '/pelajar'],
                ['label' => 'Rangking', 'url' => '/pelajar/rangking'],
                // Add more menu items dynamically here
                ];
                @endphp
                @foreach ($menuItems as $menuItem)
                <li><a href="{{ $menuItem['url'] }}" class="xl:p-4 md:p-2 py-2 block no-underline opacity-50 duration-300 transform hover:opacity-100 text-white hover:text-underline">{{ $menuItem['label'] }}</a></li>
                @endforeach
            </ul>


        </div>


        <div class="flex md:flex-row space-x-2 relative">
            @auth
            <div class="group inline-block relative">
                <button class="flex items-center space-x-2 bg-transparent text-white font-semibold">
                    <img class="w-6 h-6 rounded-full bg-white" src="{{ auth()->user()->avatar }}" alt="">
                    <span>{{ auth()->user()->username }}</span>
                </button>
                <ul class="absolute hidden mt-2  border border-gray-300 rounded-md shadow-md z-10">
                    <li>
                        <a href="{{ url('profile') }}" class="xl:p-4 md:p-2 py-2 block no-underline opacity-50 duration-300 transform hover:opacity-100 text-white hover:text-underline">Profile</a>
                    </li>
                    <li>
                        <a href="{{ url('logout') }}" class="xl:p-4 md:p-2 py-2 block no-underline opacity-50 duration-300 transform hover:opacity-100 text-white hover:text-underline">Logout</a>
                    </li>
                </ul>
            </div>
            @endauth
        </div>

        




    </nav>

    <!-- Page Content -->
    <div class="container mx-auto py-8">
        @yield('content')

        {{ View::make('footer') }}
    </div>



</body>

{{-- Mobile Menu --}}
<script type="text/javascript">
    const button = document.querySelector('#menu-button');
    const menu = document.querySelector('#menu');
    button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
{{-- Dropdown Menu --}}
<script type="text/javascript">
    const dropdown = document.querySelector('#dropdown-button');
    const dropmenu = document.querySelector('#dropdown-menu');
    dropdown.addEventListener('click', () => {
        dropmenu.classList.toggle('hidden');
    });


    function copyTextToClipboard(elementId) {
        const textToCopy = document.getElementById(elementId);

        textToCopy.select();
        textToCopy.setSelectionRange(0, 99999); // For mobile devices

        document.execCommand('copy');

        // You can add a tooltip or message to indicate the text has been copied
        // For example:
        alert('Text copied!');
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownButton = document.querySelector('.group button');
        const dropdownMenu = document.querySelector('.group ul');

        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>


</html>