@extends('layouts.pelajar')

@section('content')
<style>
    .pod {
        display: flex;
        align-items: flex-end;
    }

    .podium__item {
        min-width: 100px;
    }

    .podium__rank {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 35px;
        color: #fff;
      
    }

    .podium__total {
        display: flex;
        margin: 0px;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        color: #fff;
        background: rgb(255, 172, 37);
    }

    .podium__city {
        text-align: center;
        padding: 0 .5rem;
    }

    .podium__number {
        width: 27px;
        height: 75px;
    }

    .podium .first {
        min-height: 100px;
        

    }

    .podium .second {
        min-height: 50px;
       
    }

    .podium .third {
        min-height: 25px;
        
    }
</style>


<section class="py-20 overflow-hidden">

    <!-- component -->
    <!-- This is an example component -->



    <div class="py-0 w-full px-5 space-y-5 ">


        <div class="flex max-w-lg justify-center items-center">

            <div class="px-5 p-4 max-w-lg bg-white rounded-lg border shadow-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-4 py-3">
                    <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">{{$room}} Ranking</h3>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        View all
                    </a>
                </div>

                <div class="pod podium">
                    <div class="podium__item">
                        <p class="podium__city">{{$secondPlace->username ?? '2'}}</p>
                        <div class="podium__rank second">
                            <img src={{asset('img/set-medals_2.png')}} alt="1" class="w-auto h-auto">
                        </div>
                        <div class="podium__total second">
                            {{$secondPlace->total ?? '0'}}
                        </div>
                    </div>
                    <div class="podium__item">
                        <p class="podium__city">{{$firstPlace->username ?? '1'}}</p>
                        <div class="podium__rank first">
                            <img src={{asset('img/set-medals_1.png')}} alt="1" class="w-auto h-auto">
                        </div>
                        <div class="podium__total first">
                            {{$firstPlace->total ?? '0'}}
                        </div>
                    </div>
                    <div class="podium__item">
                        <p class="podium__city">{{$thirdPlace->username ?? '3'}}</p>
                        <div class="podium__rank third">
                            <img src={{asset('img/set-medals_3.png')}} alt="1" class="w-auto h-auto">
                        </div>
                        <div class="podium__total third">
                            {{$thirdPlace->total ?? '0'}}
                        </div>


                    </div>


                </div>


                <div class="flow-root">
                    <ul role="list" class="py-3 divide-y divide-gray-200 dark:divide-gray-700">

                        @php $n=0; @endphp
                        @foreach ($stand as $row)
                        <li class="py-3 sm:py-4 shadow rounded-md lg:py-4">
                            <div class="flex items-center space-x-4 px-2 ">
                                <div class="flex-shrink-0">
                                    @php $n++; $img='img/m-'.$n.'.png' ; @endphp

                                </div>

                                <div class="flex-shrink-0">
                                    <img class="w-6 h-6 rounded-full" src="{{ $row->avatar }}" alt="{{ $row->username }} image">

                                 </div>
                                <div class="flex-1 w-full">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ $row->username }}
                                    </p>
                                    <p class="text-sm font-medium text-gray-100 truncate dark:text-white">
                                        {{ $row->email }}
                                        
                                    </p>


                                </div>
                                <div class="inline-block items-center text-base font-semibold text-gray-900 dark:text-white">
                                    {{ $row->total }}
                                </div>

                                <div class="justify-betwen">
                                    <img src={{asset($img)}} alt="medal" class="h-6">
                                </div>
                                <div class="inline-block items-center text-base font-semibold text-gray-900 dark:text-white">
                                {{ $row->description }}
                                </div>

                            </div>
                        </li>

                        @endforeach
                    </ul>
                </div>
                
            </div>
           

        </div>
        <div class="flex justify-end items-center">
                <a href="{{ url('/pelajar/room/'.$link->id.'/done/') }}" type="button"
                    class="group relative flex w-auto justify-center rounded-md bg-orange-400 px-3 py-2 text-sm font-semibold text-white hover:bg-gray-400 shadow shadow-gray-400 duration-200">
                    < <span class="px-2"> | </span> Back
                </a>
            </div>


    </div>
</section>


<!--section class="py-20 overflow-hidden">
    <div class="py-0 w-full px-5 space-y-5">
        <div class="flex ">
            <div class="w-auto bg-color-F4F2DE py-1.5 px-2 rounded-lg shadow">
                <h2 class="md:text-2xl text-lg font-sans font-semibold text-center text-black">
                    {{$room}} Ranking
                </h2>
            </div>
        </div>
    </div>

    <div class="container mx-auto flex justify-center">
        <div class="pod podium">
            <div class="podium__item">
                <p class="podium__city">{{$secondPlace->username ?? '2'}}</p>
                <div class="podium__rank second"> 
                <img src={{asset('img/set-medals_2.png')}} alt="2" class="w-auto h-auto">
                </div>
                <div class="podium__total second">
                    {{$secondPlace->total?? '0'}}
                </div>
            </div>
            <div class="podium__item">
                <p class="podium__city">{{$firstPlace->username?? '1'}}</p>
                <div class="podium__rank first">
                <img src={{asset('img/set-medals_1.png')}} alt="1" class="w-auto h-auto">
                </div>
                <div class="podium__total first">
                    {{$firstPlace->total?? '0'}}
                </div>
            </div>
            <div class="podium__item">
                <p class="podium__city">{{$thirdPlace->username?? '3'}}</p>
                <div class="podium__rank third">
                <img src={{asset('img/set-medals_3.png')}} alt="3" class="w-auto h-auto">
                </div>
                <div class="podium__total third">
                    {{$thirdPlace->total?? '0'}}
                </div>


            </div>




        </div>
    </div>




    <div class="container mx-auto flex justify-center">
        <div class="py-0 w-full px-5 space-y-5">
            <div class="flex justify-center items-center">
                <div class="w-auto bg-color-F4F2DE py-1.5 px-2 rounded-lg shadow">
                    <h2 class="md:text-2xl text-lg font-sans font-semibold text-center text-black">

                    </h2>
                </div>
            </div>
          

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto bg-color-F4F2DE px-2 py-2">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-black border-gray-400 uppercase border-b">
                                <th class="px-4 py-3">Non</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Score</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white-fafafa divide-gray-400 divide-y">

                            @php $no=0; @endphp
                            @foreach ($stand as $row)
                           
                            @php $no++;  $img='img/m-'.$no.'.png' ; @endphp

                            <tr class="text-black">
                                <td class="px-4 py-3 text-sm">
                                <img src={{asset($img)}} alt="medal" class="h-6">
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $row->username }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $row->total }}
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex justify-end items-center">
                <a href="{{ url('/pelajar/room/'.$link->id.'/done/') }}" type="button"
                    class="group relative flex w-auto justify-center rounded-md bg-orange-400 px-3 py-2 text-sm font-semibold text-white hover:bg-gray-400 shadow shadow-gray-400 duration-200">
                    < <span class="px-2"> | </span> Back
                </a>
            </div>
        </div>
    </div>
</section-->
@endsection