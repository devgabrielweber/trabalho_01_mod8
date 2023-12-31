@extends('base.app')

@section('titulo', 'Formulário de Hospede')

@section('content')
    @php
        // dd($hospede); // é igual ao var_dump()
        if (!empty($hospede->id)) {
            $route = route('hospede.update', $hospede->id);
        } else {
            $route = route('hospede.store');
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de Hóspede</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                @csrf
                <!-- cria um hash de segurança -->

                @if (!empty($hospede->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($hospede->id)) {{ $hospede->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">


                <div class="py-4">
                    <label
                        class="block text-gray-700
                                font-bold mb-2
                    ">Nome do Hóspede</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-blue-700 rounded-md w-full"
                        name="nome"
                        value="@if (!empty($hospede->nome)) {{ $hospede->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif">
                </div>


                <div class="py-4">
                    <label
                        class="block text-gray-700
                                font-bold mb-2
                    ">CPF</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-blue-700 rounded-md w-full"
                        name="cpf"
                        value="@if (!empty($hospede->cpf)) {{ $hospede->cpf }}@elseif (!empty(old('cpf'))){{ old('cpf') }}@else{{ '' }} @endif">
                </div>


                <div class="py-4">
                    <label
                        class="block text-gray-700
                                font-bold mb-2
                    ">Telefone</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-blue-700 rounded-md w-full"
                        name="telefone"
                        value="@if (!empty($hospede->telefone)) {{ $hospede->telefone }}@elseif (!empty(old('telefone'))){{ old('telefone') }}@else{{ '' }} @endif">
                </div>

                <div class="py-4">
                    <label
                        class="block text-gray-700
                                font-bold mb-2
                    ">E-mail</label>
                    <input type="text"
                        class="px-4 py-2
                         border border-blue-700 rounded-md w-full"
                        name="email"
                        value="@if (!empty($hospede->email)) {{ $hospede->email }}@elseif (!empty(old('email'))){{ old('email') }}@else{{ '' }} @endif">
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
                        href="{{ route('hospede.index') }}">
                        <i class="fa-solid fa-arrow-left"></i> Voltar</a>
                </div>

            </form>
        </div>
    </div>
@endsection
