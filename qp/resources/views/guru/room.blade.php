@extends('layouts.app')

@section('content')
  
    <section class="py-10 overflow-hidden">
        <div class="container mx-auto flex justify-center">
            <div class="w-full py-0 px-5 space-y-5">
                <div class="flex justify-center items-center">
                    <div class="w-auto bg-color-F4F2DE py-1.5 px-2 rounded-lg shadow">
                        <h2 class="md:text-2xl text-lg font-sans font-semibold text-center text-black">
                            Daftar Soal Quiz
                        </h2>
                    </div>
                </div>       
                <div class="flex justify-between items-center">
                    <a href="{{ url('guru/room/'.$detail->id.'/quiz_add') }}" type="button" class="group relative flex w-auto justify-center rounded-md bg-green-400 px-3 py-2 text-xl font-semibold text-white hover:bg-gray-400 shadow shadow-gray-400">
                        + <span class="px-2"> | </span> Soal
                    </a>
                    <a href="{{ url('guru/room/'.$detail->id.'/standing') }}" type="button" class="group relative flex w-auto justify-center rounded-md bg-blue-400 px-3 py-2 text-xl font-semibold text-white hover:bg-gray-400 shadow shadow-gray-400">
                        Ranking
                    </a>
                </div>                       
                <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto bg-color-F4F2DE px-2 py-2">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-black uppercase border-b border-gray-400">
                                    <th class="px-4 py-3">No</th>
                                    <th class="px-4 py-3">Soal</th>
                                    <th class="px-4 py-3">Kunci Jawaban</th>
                                    <th class="px-4 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white-fafafa divide-y divide-gray-400">

                                @php $no=0; @endphp
                                @foreach ($quizzes as $row)
                                @php $no++; @endphp

                                <tr class="text-black">
                                    <td class="px-4 py-3 text-sm">
                                        {{ $no }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <img class="w-20 h-auto items-center justify-center" src="{{ asset('quiz/'.$row->image) }}" alt="{{ $row->image }}"><br>
                                        {!! $row->question !!} <br>
                                        {{ $row->a }} <br>
                                        {{ $row->b }} <br>
                                        {{ $row->c }} <br>
                                        {{ $row->d }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $row->key }}
                                    </td>
                                    <td class="px-4 py-3 text-sm flex space-x-2">
                                        <a href="{{ route('edit.quiz', [$detail, $row]) }}" class="bg-green-500 px-2 py-2 rounded-lg hover:opacity-70" onclick="return confirm('Apakah anda yakin ingin mengubah data ?');">
                                            <i class="fi fi-rr-file-edit text-color-F4F2DE"></i>
                                        </a>
                                        <a href="{{ route('delete.quiz', [$detail, $row]) }}" class="bg-red-500 px-2 py-2 rounded-lg hover:opacity-70" onclick="return confirm('Apakah anda yakin ingin menghapus data ?');">
                                            <i class="fi fi-rr-trash text-color-F4F2DE"></i>
                                        </a>
                                    </td>
                                </tr>
                                
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex justify-end items-center">
                    <a href="{{ url('/guru') }}" type="button" class="group relative flex w-auto justify-center rounded-md bg-orange-400 px-3 py-2 text-sm font-semibold text-white hover:bg-gray-400 shadow shadow-gray-400 duration-200">
                        < <span class="px-2"> | </span> Back
                    </a>
                </div>  
            </div>        
        </div>
    </section>


{{-- Mobile Menu --}}
<script type="text/javascript">
    const button = document.querySelector('#menu-button');
    const menu = document.querySelector('#menu');
    button.addEventListener('click', () => {
    menu.classList.toggle('hidden');
    });
</script>
{{-- Dropdown Menu --}}
<script type="text/javascript">
    const dropdown = document.querySelector('#dropdown-button');
    const dropmenu = document.querySelector('#dropdown-menu');
    dropdown.addEventListener('click', () => {
    dropmenu.classList.toggle('hidden');
    });
</script>
@endsection