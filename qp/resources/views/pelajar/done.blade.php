@extends('layouts.pelajar')

@section('content')
  

    <section class="py-10 overflow-hidden">
        <div class="container mx-auto flex justify-center">
            <div class="w-full py-0 px-5 space-y-5">
                <div class="flex justify-center items-center pb-5">
                    <div class="w-auto py-1.5 px-2">
                        <h2 class="md:text-2xl text-lg font-sans font-semibold text-center text-black">
                            Selamat anda sudah menyelesaikan semua soal
                        </h2>
                    </div>
                </div>                     
                <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto bg-color-F4F2DE px-2 py-2">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-black uppercase border-b border-gray-400">
                                    <th class="px-4 py-3">No</th>
                                    <th class="px-4 py-3">Soal</th>
                                    <th class="px-4 py-3">Jawaban</th>
                                    <th class="px-4 py-3">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white-fafafa divide-y divide-gray-400">

                                @php $no=0; @endphp
                                @foreach ($table as $row)
                                @php $no++; @endphp

                                <tr class="text-black">
                                    <td class="px-4 py-3 text-sm">
                                        {{ $no }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {!! $row->question !!} 
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $row->answer }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $row->desc }}
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

    <section class="py-10 overflow-hidden h-screen">
        <div class="container mx-auto flex justify-center">
            <div class="pb-1 px-10 max-w-xl">
                <div class="space-y-2 rounded-md shadow-sm flex flex-col justify-center items-center">
                    <a href="{{ url('/pelajar/room/'.$done->id.'/standing') }}" class="px-4 py-2 text-lg text-blue-2F308B group relative flex w-auto justify-center rounded-lg hover:opacity-50 bg-blue-400">
                        Ranking
                    </a>
                    <a href="{{ url('/pelajar') }}" class="px-4 py-2 text-lg text-blue-2F308B group relative flex w-auto justify-center rounded-lg hover:opacity-50 bg-green-400">
                        Home
                    </a>
                </div>
            </div>            
        </div>
    </section>
@endsection