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
    <a href="{{ route('aluno.create') }}">Cadastrar</a><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data Nascimento</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Telefone</th>
        </tr>
        @foreach ($alunos as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->data_nascimento}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->cpf}}</td>
                <td>{{$item->telefone}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
