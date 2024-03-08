@extends('layouts.pelajar')

@section('content')


<section class="py-10 overflow-hidden">
    <div class="container mx-auto flex justify-center h-full">
        <div class="pb-1 px-10 max-w-xl  h-screen">
            @if (session('success'))
            <div class="alert alert-success ">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger bg-red-500 text-white font-bold rounded-t px-4 py-2">
                {{ session('error') }}
            </div>
            @endif


            <form class="space-y-6" action="{{ url('/pelajar') }}" method="POST" onsubmit="return confirmSubmit()" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="remember" value="true">
                <div>
                    <h2 class="pb-5 text-center text-3xl font-roboto font-bold tracking-tight text-white">
                        Play Game Quiz & Enjoy
                       
                    </h2>
                </div>
                <div class="px-3 space-y-2 py-5 bg-white rounded-lg shadow-lg flex flex-col items-center">


                    <div class="w-full">
                        <label for="code" class="sr-only">Enter Room Code</label>
                        <input value="{{ old('code') }}" id="code" name="code" type="password" required class="relative block w-full rounded-full border-0 py-1.5 text-black-1E1E1E placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-gray-300" placeholder="Enter Room Code">
                    </div>

                    <div class="w-full">
                        <button type="submit" class="group relative flex w-full justify-center rounded-full bg-green-400 px-3 py-2 text-sm font-semibold text-white hover:text-black hover:bg-gray-300 duration-200 shadow shadow-orange-400 hover:shadow-gray-300">
                            Get Room
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
@endsection