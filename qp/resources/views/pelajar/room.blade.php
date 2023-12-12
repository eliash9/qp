@extends('layouts.pelajar')

@section('content')
  

    <section class="py-20 overflow-hidden h-screen">
        <div class="container mx-auto flex justify-center">
            <div class="py-0 w-full px-5 space-y-10">        
                <div class="flex flex-col justify-center items-center space-y-10">
                    <h2 class="text-center text-xl font-sans font-bold tracking-widest text-black uppercase">
                        {{ $detail->room }}
                    </h2>
                    <a href="{{ url('/pelajar/room/'.$detail->id.'/room_post') }}" class="px-7 py-2 text-2xl text-white group relative flex w-auto justify-center rounded-lg hover:opacity-50 bg-green-400">
                        Play
                    </a>
                </div>

                <div class="flex justify-end items-center">
                    <a href="{{ url('/pelajar') }}" type="button" class="group relative flex w-auto justify-center rounded-md bg-orange-400 px-3 py-2 text-sm font-semibold text-white hover:bg-gray-400 shadow shadow-gray-400 duration-200">
                        < <span class="px-2"> | </span> Back
                    </a>
                </div>   
            </div>        
        </div>
    </section>
@endsection