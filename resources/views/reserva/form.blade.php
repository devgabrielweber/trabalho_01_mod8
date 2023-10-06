@extends('base.app')

@section('titulo', 'Formulário de Reserva')

@section('content')
    @php
        // dd($reserva); // é igual ao var_dump()
        if (!empty($reserva->id)) {
            $route = route('reserva.update', $reserva->id);

            $data_inicio = $reserva->data_inicio;
            $data_inicio = date('Y-m-d', strtotime($data_inicio));

            $data_fim = $reserva->data_fim;
            $data_fim = date('Y-m-d', strtotime($data_fim));
        } else {
            $route = route('reserva.store');

            $data_inicio = date("Y-m-d");

            $data_fim = date("Y-m-d");
        }

        
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de Reserva</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                @csrf
                <!-- cria um hash de segurança -->

                @if (!empty($reserva->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($reserva->id)) {{ $reserva->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">


                <div class="py-4">
                    <label class="block text-gray-700
                                 font-bold mb-2">Hóspede</label>
                    <select name="hospede_id"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2
                                border-blue-700 text-gray-600 border-opacity-300
                                focus:ring-0 focus:border-blue-700
                        ">
                        @foreach ($hospedes as $item)
                            <option value="{{ $item->id }}"
                            @if( (!empty($reserva->id)) && $reserva->hospede_id == $item->id) {{ 'selected' }}@endif>
                            {{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="py-4">
                    <label class="block text-gray-700
                                 font-bold mb-2">Quarto</label>
                    <select name="quarto_id"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2
                                border-blue-700 text-gray-600 border-opacity-300
                                focus:ring-0 focus:border-blue-700
                        ">
                        @foreach ($quartos as $item)
                            <option value="{{ $item->id }}" @if( (!empty($reserva->id)) && $reserva->quarto_id == $item->id) {{ 'selected' }}@endif>{{ $item->numero }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="py-4">
                    <label
                        class="block text-gray-700
                                font-bold mb-2
                    ">Data
                        Início</label>
                    <input type="date"
                        class="px-4 py-2
                         border border-blue-700 rounded-md w-full"
                        name="data_inicio"
                        value="{{$data_inicio}}">
                </div>


                <div class="py-4">
                    <label
                        class="block text-gray-700
                                font-bold mb-2
                    ">Data
                        Fim</label>
                    <input type="date"
                        class="px-4 py-2
                         border border-blue-700 rounded-md w-full"
                        name="data_fim",
                        value="{{$data_fim}}">
                </div>
            


                
                <div class="py-4 px-2 flex center">
                    <button
                        class="
                            bg-green-500 hover:bg-green-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-green-300
                        "
                        type="submit"> <i class="fa-regular fa-floppy-disk"></i> Salvar</button>
                    <div class="px-2"></div>
                    <a class="
                            bg-blue-500 hover:bg-blue-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-blue-300"
                        href="{{ route('reserva.index') }}">
                        <i class="fa-solid fa-arrow-left"></i> Voltar</a>
                </div>

            </form>
        </div>
    </div>
@endsection
