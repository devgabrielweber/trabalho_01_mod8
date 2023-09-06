@extends('base.app')

@section('titulo', 'Formulário de Aluno')

@section('content')
    @php
        // dd($aluno); // é igual ao var_dump()
        if (!empty($aluno->id)) {
            $route = route('aluno.update', $aluno->id);
        } else {
            $route = route('aluno.store');
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de Aluno</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                @csrf
                <!-- cria um hash de segurança -->

                @if (!empty($aluno->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($aluno->id)) {{ $aluno->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">

                <label class="block">
                    <span class="text-gray-700">Nome</span>
                    <input type="text" name="nome"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                    focus:ring-0 focus:border-black"
                        value="@if (!empty($aluno->nome)) {{ $aluno->nome }} @elseif(!empty(old('nome'))) {{ old('nome') }} @else {{ '' }} @endif">
                </label>
                <div class="mb-4 md:flex grid grid-rows-2">
                    <div class="relative mb-6">
                        <label class="block">
                            <span class="text-gray-700">Data Nascimento</span>
                            <input type="text" name="data_nascimento"
                                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                    focus:ring-0 focus:border-black"
                                value="@if (!empty($aluno->data_nascimento)) {{ $aluno->data_nascimento }} @elseif (!empty(old('data_nascimento'))){{ old('data_nascimento') }}@else{{ '' }} @endif">
                        </label>
                    </div>
                    <div class="md-4 md:mr-2 md:mb-0 col-span-2">
                        <label class="block">
                            <span class="text-gray-700">CPF</span>
                            <input type="text" name="cpf"
                                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                        focus:ring-0 focus:border-black"
                                value=" @if (!empty($aluno->cpf)) {{ $aluno->cpf }}@elseif(!empty(old('cpf'))){{ old('cpf') }}@else{{ '' }} @endif"><br><br>
                        </label>
                    </div>
                </div>
                <label class="block">
                    <span class="text-gray-700">Email</span>
                    <input type="email" name="email"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black"
                        value="@if (!empty($aluno->email)) {{ $aluno->email }}@elseif(!empty(old('email'))) {{ old('email') }} @else{{ '' }} @endif"><br><br>
                </label>

                <label class="block">
                    <span class="text-gray-700">Telefone</span>
                    <input type="text" name="telefone"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                    focus:ring-0 focus:border-black"
                        value="@if (!empty(old('telefone'))) {{ old('telefone') }}@elseif(!empty($aluno->telefone)){{ $aluno->telefone }}@else{{ '' }} @endif"><br><br>
                </label>
                {{-- dd($categorias) --}}
                <label class="block">
                    <span class="text-gray-700">Categoria</span>
                    <select name="categoria_aluno_id"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black">
                        @foreach ($categorias as $item)
                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </label>
                @php
                    $nome_imagem = !empty($aluno->imagem) ? $aluno->imagem : 'sem_imagem.jpg';
                @endphp
                <div>
                    <img class="h-40 w-40 object-cover rounded-full" src="/storage/{{ $nome_imagem }}" width="300px"
                        alt="imagem">
                    <br>
                    <input
                        class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-green-50 file:text-green-700
                                hover:file:bg-green-100"
                        type="file" name="imagem"><br>
                </div>
                <br>
                <br>
                <button
                    class="rounded-full text-neutral-100 bg-green-700 px-4 py-2 w-40 font-bold hover:bg-green-900 hover:text-neutro-700"
                    type="submit">Salvar</button>

                <button><a class="rounded-full text-neutral-100 bg-blue-700 px-4 py-2 w-40 font-bold hover:bg-blue-300"
                        href="{{ route('aluno.index') }}">Voltar</a></button>
            </form>
        </div>
    </div>
@endsection
