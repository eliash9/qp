@extends('layouts.admin')

@section('content')

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<section class="py-10 overflow-hidden">
    <div class="container mx-auto flex justify-center">
        <div class="w-full py-0 px-5 space-y-5">
          
                    <h2 class="md:text-2xl text-lg font-sans font-semibold  text-black">
                        Admin Dashboard
                    </h2>
          
          
            <div class="grid gap-8 space-x-1 lg:grid-cols-4">
            @foreach($tableCounts as $table => $count)
                 
                <div class="px-4 py-4 bg-white border-2 border-gray-400 rounded">
                    <h3 class="text-2xl text-center text-gray-800"> {{ $count }}</h3>
                    <p class="text-center text-gray-500"> {{ $table }}</p>
                </div>
                @endforeach
                <div class="px-4 py-4 bg-white border-2 border-gray-400 rounded">
                    <h3 class="text-2xl text-center text-gray-800">  {{ $answerPercentage }}</h3>
                    <p class="text-center text-gray-500"> % Benar</p>
                </div>
               
                

            </div>


        </div>



    </div>


</section>


@endsection