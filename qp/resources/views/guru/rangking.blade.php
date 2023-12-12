@extends('layouts.app')

@section('content')
  

    <section class="py-20 overflow-hidden">
        <div class="container mx-auto flex justify-center">
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
                                <tr class="text-xs font-semibold tracking-wide text-left text-black border-gray-400 uppercase border-b">
                                    <th class="px-4 py-3">No</th>
                                    <th class="px-4 py-3">Name</th>
                                    <th class="px-4 py-3">Score</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white-fafafa divide-y divide-gray-400">

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
            </div>        
        </div>
    </section>

    <section class="py-20 overflow-hidden">
        <div class="container mx-auto flex justify-center">
            <div class="py-0 w-full px-5 space-y-5">    
                <div class="flex justify-center items-center">
                    <div class="w-auto bg-color-F4F2DE py-1.5 px-2 rounded-lg shadow">
                        <h2 class="md:text-2xl text-lg font-sans font-semibold text-center text-black">
                            Percentage
                        </h2>
                    </div>
                </div>                
                <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto bg-color-F4F2DE px-2 py-2">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-black border-gray-400 uppercase border-b">
                                    <th class="px-4 py-3">Soal</th>
                                    <th class="px-4 py-3">True</th>
                                    <th class="px-4 py-3">False</th>
                                    <th class="px-4 py-3">User</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white-fafafa divide-y divide-gray-400">

                                @foreach ($quizzes as $row)

                                <tr class="text-black">
                                    <td class="px-4 py-3 text-sm">
                                        {!! $row->question !!}
                                    </td> 
                                    <td class="px-4 py-3 text-sm">
                                        {{ $row->getCorrectAnswerPercentage() }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $row->getWrongAnswerPercentage() }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $row->getUserPlays() }} user
                                    </td>
                                </tr>
                                
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex justify-end items-center">
                    <a href="{{ url('guru') }}" type="button" class="group relative flex w-auto justify-center rounded-md bg-orange-400 px-3 py-2 text-sm font-semibold text-white hover:bg-gray-400 shadow shadow-gray-400 duration-200">
                        < <span class="px-2"> | </span> Back
                    </a>
                </div>   
            </div>        
        </div>
    </section>

    @endsection
