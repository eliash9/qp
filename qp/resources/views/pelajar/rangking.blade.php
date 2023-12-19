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
        background: rgb(255, 172, 37);

    }

    .podium .second {
        min-height: 50px;
        background: blue;
    }

    .podium .third {
        min-height: 25px;
        background: green;
    }
</style>

<section class="py-20 overflow-hidden">


    <div class="py-0 w-full px-5 space-y-5 ">
        <div class="flex justify-center items-center">
            <div class="pod podium">
                <div class="podium__item">
                    <p class="podium__city">{{$secondPlace->username ?? '2'}}</p>
                    <div class="podium__rank second">2</div>
                    <div class="podium__total second">
                        {{$secondPlace->total?? '0'}}
                    </div>
                </div>
                <div class="podium__item">
                    <p class="podium__city">{{$firstPlace->username?? '1'}}</p>
                    <div class="podium__rank first">
                        <svg class="podium__number" viewBox="0 0 27.476 75.03" xmlns="http://www.w3.org/2000/svg">
                            <g transform="matrix(1, 0, 0, 1, 214.957736, -43.117417)">
                                <path class="st8"
                                    d="M -198.928 43.419 C -200.528 47.919 -203.528 51.819 -207.828 55.219 C -210.528 57.319 -213.028 58.819 -215.428 60.019 L -215.428 72.819 C -210.328 70.619 -205.628 67.819 -201.628 64.119 L -201.628 117.219 L -187.528 117.219 L -187.528 43.419 L -198.928 43.419 L -198.928 43.419 Z"
                                    style="fill: #000;" />
                            </g>
                        </svg>
                    </div>
                    <div class="podium__total first">
                        {{$firstPlace->total?? '0'}}
                    </div>
                </div>
                <div class="podium__item">
                    <p class="podium__city">{{$thirdPlace->username?? '3'}}</p>
                    <div class="podium__rank third">
                        3
                    </div>
                    <div class="podium__total third">
                        {{$thirdPlace->total?? '0'}}
                    </div>


                </div>


            </div>

        </div>


        <div class="py-0 w-full px-5 space-y-5">
            <div class="flex justify-center items-center">
                <div class="w-auto bg-color-F4F2DE py-1.5 px-2 rounded-lg shadow">
                    <h2 class="md:text-2xl text-lg font-sans font-semibold text-center text-black">
                        Global Ranking
                    </h2>
                </div>
            </div>
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto bg-color-F4F2DE px-2 py-2">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-black border-gray-400 uppercase border-b">
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Score</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white-fafafa divide-gray-400 divide-y">

                            @php $no=0; @endphp
                            @foreach ($stand as $row)
                            @php $no++; @endphp

                            <tr class="text-black">
                                <td class="px-4 py-3 text-sm">
                                    {{ $no }}
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
            <!--div class="flex justify-end items-center">
                    <a href="{{ url('/pelajar/room') }}" type="button" class="group relative flex w-auto justify-center rounded-md bg-orange-400 px-3 py-2 text-sm font-semibold text-white hover:bg-gray-400 shadow shadow-gray-400 duration-200">
                        < <span class="px-2"> | </span> Back
                    </a>
                </div-->
        </div>
    </div>
</section>
@endsection