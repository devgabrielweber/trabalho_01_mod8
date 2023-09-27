@extends('base.app')

@section('titulo', 'Listagem de Matriculas')

@section('content')

    <h3 class="pt-4 text-2xl font-medium">Listagem de Matriculas</h3>
    <div class="block w-full flex space-x-3 rounded-lg bg-white p-6 dark:bg-neutral-700">

        <form action="{{ route('matricula.search') }}" method="post">
            @csrf
            <!-- cria um hash de segurança -->
            <div class="grid grid-cols-3 gap-6 flex space-x-4">

                <!--First name input-->
                <div class="relative mb-6" data-te-input-wrapper-init>
                    <select name="tipo"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2
                            border-blue-700 border-opacity-30 text-gray-600
                        ">
                        <option value="nome">Nome</option>
                        <option value="data_nascimento">Data Nascimento</option>
                        <option value="email">Email</option>
                        <option value="cpf">CPF</option>
                        <option value="telefone">Telefone</option>
                    </select>
                </div>
                <!--Last name input-->
                <div class="relative mb-6" data-te-input-wrapper-init>
                    <input
                        class="mt-0 block w-full px-0.5 border-0 border-b-2
                    border-blue-700 border-opacity-30 text-gray-600
                "
                        type="text" name="valor" placeholder="Pesquisar">
                </div>
                <!--Submit button-->
                <div class="relative mb-6">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white
                            font-semibold py-2 px-4 rounded focus:outline
                            focus:ring focus:border-blue-300"
                        data-te-ripple-init data-te-ripple-color="light">
                        <i class="fa-solid fa-magnifying-glass"></i> Buscar
                    </button>
                    <a class="bg-green-500 hover:bg-green-600 text-white
                                font-semibold py-2 px-4 rounded focus:outline
                                focus:ring focus:border-green-300"
                        href="{{ route('matricula.create') }}">
                        <i class="fa-solid fa-plus"></i>
                        Cadastrar</a><br>
                </div>
            </div>

        </form>
    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">ID</th>
                                <th scope="col" class="px-6 py-4">Curso</th>
                                <th scope="col" class="px-6 py-4">Turma</th>
                                <th scope="col" class="px-6 py-4">Aluno</th>
                                <th scope="col" class="px-6 py-4">Data Nascimento</th>
                                <th scope="col" class="px-6 py-4">Ações</th>
                                <th scope="col" class="px-6 py-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matriculas as $item)
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->curso->nome ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->turma->nome ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->aluno->nome ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->data_matricula }}</td>
                                    <td class="whitespace-nowrap px-6 py-4"><a
                                            href="{{ route('matricula.edit', $item->id) }}"><i class="fa-solid fa-pen-to-square" style="color: orange;"></i></a></td>
                                    <td class="whitespace-nowrap px-6 py-4"><a
                                            href="{{ route('matricula.destroy', $item->id) }}"
                                            onclick="return confirm('Deseja Excluir?')"><i class="fa-solid fa-trash" style="color: red"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
