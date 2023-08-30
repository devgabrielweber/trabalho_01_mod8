@extends('base.app')

@section('titulo', 'Listagem de Alunos')

@section('content')



<h3 class="pt-4 text-2xl font-medium">Listagem de Alunos</h3>
    <div
        class="block w-full flex space-x-3 rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">

        <form action="{{ route('aluno.search') }}" method="post">
            @csrf
            <!-- cria um hash de segurança -->
            <div class="grid grid-cols-2 gap-4">
                <!--First name input-->
                <div class="relative mb-6" data-te-input-wrapper-init>
                    <select name="tipo"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">
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
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        type="text" name="valor" placeholder="Pesquisar">
                </div>
                <!--Submit button-->
                <button type="submit"
                    class="inline-block w-full rounded bg-blue-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                    data-te-ripple-init data-te-ripple-color="light">
                    Buscar
                </button>
                <a class="inline-block w-full rounded bg-green-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                    href="{{ route('aluno.create') }}">Cadastrar</a><br>
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
                                <th scope="col" class="px-6 py-4">Imagem</th>
                                <th scope="col" class="px-6 py-4">Nome</th>
                                <th scope="col" class="px-6 py-4">Data Nascimento</th>
                                <th scope="col" class="px-6 py-4">Email</th>
                                <th scope="col" class="px-6 py-4">CPF</th>
                                <th scope="col" class="px-6 py-4">Telefone</th>
                                <th scope="col" class="px-6 py-4">Categoria</th>
                                <th scope="col" class="px-6 py-4">Ações</th>
                                <th scope="col" class="px-6 py-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alunos as $item)
                                @php
                                    $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.jpg';
                                @endphp
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->id }}</td>
                                    <td class="h-32 w-32 object-cover rounded-full"><img src="/storage/{{ $nome_imagem }}" width="100px"
                                            alt="imagem"></td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->nome }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->data_nascimento }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->email }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->cpf }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->telefone }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->categoria->nome ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4"><a
                                            href="{{ route('aluno.edit', $item->id) }}">Editar</a></td>
                                    <td class="whitespace-nowrap px-6 py-4"><a
                                            href="{{ route('aluno.destroy', $item->id) }}"
                                            onclick="return confirm('Deseja Excluir?')">Excluir</a>
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
