@extends('layouts.app')

@section('content')
  

    <section class="py-10 overflow-hidden">
        <div class="container mx-auto flex justify-center">
            <div class="w-full py-0 px-5 space-y-5">
                <div class="flex justify-center items-center">
                    <div class="w-auto bg-color-F4F2DE py-1.5 px-2 rounded-lg shadow">
                        <h2 class="md:text-2xl text-lg font-sans font-semibold text-center text-black">
                            Room Tersedia
                        </h2>
                    </div>
                </div>       
                <div class="flex justify-between items-center">
                    <a href="{{ url('/guru/room_add') }}" type="button" class="group relative flex w-auto justify-center rounded-md bg-green-400 px-3 py-2 text-xl font-semibold text-white hover:bg-gray-400 shadow shadow-gray-400">
                        + <span class="px-2"> | </span> Room
                    </a>
                </div>                       
                <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto bg-color-F4F2DE px-2 py-2">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-black uppercase border-b border-gray-400">
                                    <th class="px-4 py-3">No</th>
                                    <th class="px-4 py-3">Room</th>
                                    <th class="px-4 py-3">Room Code</th>
                                    <th class="px-4 py-3">Tanggal</th>
                                    <th class="px-4 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white-fafafa divide-y divide-gray-400">

                                @php $no=0; @endphp
                                @foreach ($room as $row)
                                @php $no++; @endphp

                                <tr class="text-black">
                                    <td class="px-4 py-3 text-sm">
                                        {{ $no }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <div class="flex justify-between items-center">
                                            <a href="{{ url ('guru/room', $row->id) }}" type="button" class="group relative flex w-auto justify-center rounded-md bg-black px-3 py-2 text-lg font-semibold text-color-F4F2DE hover:opacity-50 duration-200">  
                                            {{ $row->room }}
                                            </a>
                                        </div> 
                                    </td> 
                                    <td class="px-4 py-3 text-sm">
                                       

                                        <input class="rounded-lg border-0 py-1.5 text-black placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-white" type="text" id="textToCopy{{$row->id}}" value=" {{ $row->code }}">
                                        <button class="bg-red-500 text-white px-2 py-2 rounded-lg hover:opacity-70" onclick="copyTextToClipboard('textToCopy{{$row->id}}')">Copy Kode</button>
                                        <a href="/guru/generateCodeForRoom/{{$row->id}}" class="bg-red-500 px-2 py-2 rounded-lg hover:opacity-70" onclick="return confirm('Apakah anda yakin ingin mengubah data ?');">
                                            <i class="fi fi-rr-refresh text-color-F4F2DE"></i>

                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $row->created_at }}
                                    </td>
                                    <td class="px-2 py-2 text-sm flex space-x-2">
                                   
                                           
                                        <a href="/guru/room_delete/{{$row->id}}" class="bg-red-500 px-2 py-2 rounded-lg hover:opacity-70" onclick="return confirm('Apakah anda yakin ingin menghapus data ?');">
                                            <i class="fi fi-rr-trash text-color-F4F2DE"></i>
                                        </a>
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
    @endsection
