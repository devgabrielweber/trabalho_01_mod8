@extends('base.app')

@section('titulo', 'Formulário de Ramal')

@section('content')
    @php
        if (!empty($ramal->id)) {
            $route = route('ramal.update', $ramal->id);
        } else {
            $route = route('ramal.store');
        }
    @endphp

    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de Ramal</h3>

            <form action="{{ $route }}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                @csrf

                @if (!empty($ramal->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($ramal->id)) {{ $ramal->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">

                <div class="py-4">
                    <label class="block text-gray-700 font-bold mb-2">Nome</label>
                    <input type="text" class="px-4 py-2 border border-blue-700 rounded-md w-full" name="nome"
                        value="@if (!empty($ramal->nome)) {{ $ramal->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif">
                </div>

                <div class="py-4">
                    <label class="block text-gray-700 font-bold mb-2">Telefone</label>
                    <input type="text" class="px-4 py-2 border border-blue-700 rounded-md w-full" name="telefone"
                        value="@if (!empty($ramal->telefone)) {{ $ramal->telefone }}@elseif (!empty(old('telefone'))){{ old('telefone') }}@else{{ '' }} @endif">
                </div>

                <div class="py-4">
                    <label class="block text-gray-700 font-bold mb-2">Responsável</label>
                    <input type="text" class="px-4 py-2 border border-blue-700 rounded-md w-full" name="responsavel"
                        value="@if (!empty($ramal->responsavel)) {{ $ramal->responsavel }}@elseif (!empty(old('responsavel'))){{ old('responsavel') }}@else{{ '' }} @endif">
                </div>

                <div class="py-4 px-2 flex center">
                    <button
                        class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded focus:outline focus:ring focus:border-green-300"
                        type="submit">
                        <i class="fa-regular fa-floppy-disk"></i> Salvar
                    </button>
                    <div class="px-2"></div>
                    <a class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline focus:ring focus:border-blue-300"
                        href="{{ route('ramal.index') }}">
                        <i class="fa-solid fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
