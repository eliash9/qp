@extends('layouts.pelajar')

@section('content')


<section class="py-10 overflow-hidden">

    <div class="py-0 w-full px-5 space-y-5 ">


        <div class="max-w-lg justify-center items-center">

            <div class="px-5 p-4 w-lg bg-white rounded-lg border shadow-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-4 py-3">
                    <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white"> {{ $detail->room }}</h3>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        {{ $detail->id }}
                    </a>
                </div>
                <div class="flex justify-between items-center mb-4 py-3">
                    @if (session('success'))
                    @endif
                    @if (session('error'))
                    @endif

                    @if ($active)
                    <a href="{{ url('/pelajar/room/'.$detail->code.'/room_post') }}" class="px-7 py-2 text-2xl text-white group relative flex w-auto justify-center rounded-lg hover:opacity-50 bg-green-400 ">
                        Play
                    </a>
                    @else
                    Mohon tunggu
                    @endif
                </div>




                <div class="flow-root">

                    <ul role="list" class="py-3 divide-y divide-gray-200 dark:divide-gray-700">

                        @php $n=0; @endphp
                        @foreach($roomParticipants as $participant)
                        <li class="py-3 sm:py-4 shadow rounded-md lg:py-4">
                            <div class="flex items-center space-x-4 px-2 ">

                                <div class="flex-1 w-full">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ $participant->name }}
                                    </p>
                                </div>


                            </div>
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>

        </div>



    </div>
</section>

@endsection