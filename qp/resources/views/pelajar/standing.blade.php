@extends('layouts.pelajar')

@section('content')
  

    <section class="py-20 overflow-hidden">
        <div class="container mx-auto flex justify-center">
            <div class="py-0 w-full px-5 space-y-5">                   
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
                <div class="flex justify-end items-center">
                    <a href="{{ url('/pelajar/room/'.$link->id.'/done/') }}" type="button" class="group relative flex w-auto justify-center rounded-md bg-orange-400 px-3 py-2 text-sm font-semibold text-white hover:bg-gray-400 shadow shadow-gray-400 duration-200">
                        < <span class="px-2"> | </span> Back
                    </a>
                </div>   
            </div>        
        </div>
    </section>
@endsection