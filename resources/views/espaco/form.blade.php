@extends('base.app')

@section('titulo', 'Formulário de Espaco')

@section('content')
    @php
        // dd($espaco); // é igual ao var_dump()
        if (!empty($espaco->id)) {
            $route = route('espaco.update', $espaco->id);
        } else {
            $route = route('espaco.store');
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de Espaco</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                @csrf
                <!-- cria um hash de segurança -->

                @if (!empty($espaco->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($espaco->id)) {{ $espaco->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">


                <div class="py-4">
                    <label
                        class="block text-gray-700
                                font-bold mb-2
                    ">Nome
                        do local de espaco</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-blue-700 rounded-md w-full" name="nome"
                        value="@if (!empty($espaco->nome)) {{ $espaco->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif">
                </div>


                <div class="py-4">
                    <label
                        class="block text-gray-700
                                font-bold mb-2
                    ">Descrição</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-blue-700 rounded-md w-full" name="descricao"
                        value="@if (!empty($espaco->descricao)) {{ $espaco->descricao }}@elseif (!empty(old('descricao'))){{ old('descricao') }}@else{{ '' }} @endif">
                </div>


                <div class="py-4">
                    <label
                        class="block text-gray-700
                                font-bold mb-2
                    ">Valor</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-blue-700 rounded-md w-full" name="valor"
                        value="@if (!empty($espaco->valor)) {{ $espaco->valor }}@elseif (!empty(old('valor'))){{ old('valor') }}@else{{ '' }} @endif">
                </div>

                <div class="py-4">
                    <label
                        class="block text-gray-700
                                font-bold mb-2
                    ">Foto</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-blue-700 rounded-md w-full" name="foto"
                        value="@if (!empty($espaco->foto)) {{ $espaco->foto }}@elseif (!empty(old('foto'))){{ old('foto') }}@else{{ '' }} @endif">
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
                        href="{{ route('espaco.index') }}">
                        <i class="fa-solid fa-arrow-left"></i> Voltar</a>
                </div>

            </form>
        </div>
    </div>
@endsection
