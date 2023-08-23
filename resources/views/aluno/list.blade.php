<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Listagem de Alunos</h3>
    <form action="{{ route('aluno.search') }}" method="post">
        @csrf <!-- cria um hash de segurança -->
        <select name="tipo" >
            <option value="nome">Nome</option>
            <option value="data_nascimento">Data Nascimento</option>
            <option value="email">Email</option>
            <option value="cpf">CPF</option>
            <option value="telefone">Telefone</option>
        </select>
        <input type="text" name="valor">
        <button type="submit">Buscar</button>
        <a href="{{ route('aluno.create') }}">Cadastrar</a><br>
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Data Nascimento</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
        @foreach ($alunos as $item)
        @php
            $nome_imagem = !empty($item->imagem) ?
                $item->imagem : 'sem_imagem.jpg';
        @endphp
            <tr>
                <td><img src="/storage/{{$nome_imagem}}"
                    width="100px" alt="imagem"></td>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->data_nascimento}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->cpf}}</td>
                <td>{{$item->telefone}}</td>
                <td>{{$item->categoria->nome ?? "" }}</td>
                <td><a href="{{route('aluno.edit', $item->id)}}">Editar</a></td>
                <td><a href="{{route('aluno.destroy', $item->id)}}"
                    onclick="return confirm('Deseja Excluir?')">Excluir</a>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
