@extends('base.app')

@section('titulo', 'Formulário de Matricula')

@section('content')
    @php
        // dd($matricula); // é igual ao var_dump()
        if (!empty($matricula->id)) {
            $route = route('matricula.update', $matricula->id);
        } else {
            $route = route('matricula.store');
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de Matricula</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                @csrf
                <!-- cria um hash de segurança -->

                @if (!empty($matricula->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($matricula->id)) {{ $matricula->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">

                <div class="py-4">
                    <label class="block text-gray-700
                                 font-bold mb-2">Curso</label>
                    <select name="curso_id"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2
                                border-blue-700 text-gray-600 border-opacity-300
                                focus:ring-0 focus:border-blue-700
                        ">
                        @foreach ($cursos as $item)
                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="py-4">
                    <label class="block text-gray-700
                                  font-bold mb-2">Turma</label>
                    <select name="turma_id"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2
                                border-blue-700 border-opacity-300
                                focus:ring-0 focus:border-blue-700
                        ">
                        @foreach ($turmas as $item)
                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="py-4">
                    <label class="block text-gray-700
                                 font-bold mb-2">Aluno</label>
                    <select name="aluno_id"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2
                                border-blue-700 text-gray-600 border-opacity-300
                                focus:ring-0 focus:border-blue-700
                        ">
                        @foreach ($alunos as $item)
                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="py-4">
                    <label
                        class="block text-gray-700
                                font-bold mb-2
                    ">Data
                        Matricula</label>
                    <input type="date"
                        class="px-4 py-2
                         border border-blue-700 rounded-md w-full"
                        name="data_matricula">
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
                        href="{{ route('matricula.index') }}">
                        <i class="fa-solid fa-arrow-left"></i> Voltar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
