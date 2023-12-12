@extends('layouts.app')

@section('content')
  
    <section class="py-20 overflow-hidden h-screen">
        <div class="container mx-auto flex justify-center">
            <div class="py-0 w-full px-5 space-y-5">                   
                <!-- Form -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs py-5">
                            
                    @include('errors.message')

                    <form class="py-5 font-roboto px-5 bg-color-F4F2DE rounded-xl space-y-2" method="POST" action="{{ url('/guru/room_add') }}" onsubmit="return confirmSubmit()" enctype="multipart/form-data">
                        
                        @csrf
                        
                        <h2 class="md:text-2xl text-lg font-sans font-semibold text-center text-black">
                            Input Room
                        </h2>
                        <div>
                            <label for="room" class="sr-only">Room Name</label>
                            <input value="{{ old('room') }}" id="room" name="room" type="text" required class="relative block w-full rounded-lg border-0 py-1.5 text-black placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-white" placeholder="Room Name">
                        </div>
                        <div>
                            <label for="code" class="sr-only">Room Code</label>
                            <input value="{{ old('code') }}" id="code" name="code" type="password" autocomplete="current-password" required class="relative block w-full rounded-lg border-0 py-1.5 text-black placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-white" placeholder="Room Code">
                        </div>
                        <button type="submit" class="group relative flex w-auto justify-center rounded-lg bg-green-400 px-3 py-2 text-sm font-normal text-color-F4F2DE hover:opacity-50 duration-200">
                            Submit
                        </button>
                    </form>
                </div>
                <div class="flex justify-end items-center">
                    <a href="{{ url('/guru') }}" type="button" class="group relative flex w-auto justify-center rounded-md bg-orange-400 px-3 py-2 text-sm font-semibold text-white hover:bg-gray-400 shadow shadow-gray-400 duration-200">
                        < <span class="px-2"> | </span> Back
                    </a>
                </div>   
            </div>        
        </div>
    </section>


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
</script>
@endsection