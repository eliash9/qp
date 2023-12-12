@extends('layouts.pelajar')

@section('content')
  

    <section class="py-10 overflow-hidden h-screen">
        <div class="container mx-auto flex justify-center">
            <div class="pb-1 px-10 max-w-xl">
                @if (session('success'))
                @endif
                @if (session('error'))
                @endif
                <form class="space-y-6" action="{{ url('/pelajar') }}" method="POST" onsubmit="return confirmSubmit()" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="remember" value="true">
                    <div class="-space-y-2 rounded-md shadow-sm flex flex-col items-center">
                        <div>
                            <h2 class="pb-5 text-center text-3xl font-roboto font-bold tracking-tight text-black">
                                Play Game Quiz <br> & <br> Enjoy
                            </h2>  
                        </div>
                        <div>
                            <img src={{asset('img/illus3.png')}} alt="ilustrasi" class="h-auto w-72">
                        </div>
                        <div>
                            <label for="code" class="sr-only">Enter Room Code</label>
                            <input value="{{ old('code') }}" id="code" name="code" type="password" required class="relative block w-full rounded-md border-0 py-1.5 text-black-1E1E1E placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-gray-300" placeholder="Enter Room Code">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="group relative flex w-full justify-center rounded-md bg-green-400 px-3 py-2 text-sm font-semibold text-white hover:text-black hover:bg-gray-300 duration-200 shadow shadow-orange-400 hover:shadow-gray-300">
                            Get Room
                        </button>
                    </div>
                </form>
            </div>            
        </div>
    </section>
@endsection