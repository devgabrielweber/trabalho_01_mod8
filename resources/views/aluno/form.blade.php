<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário Aluno</title>
</head>
<body>
    <h3>Formulário de Aluno</h3>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @php
       // dd($aluno); // é igual ao var_dump()
        if(!empty($aluno->id)){
          $route = route('aluno.update', $aluno->id);
        } else {
          $route = route('aluno.store');
        }
    @endphp
    <form action="{{ $route }}" method="post">
        @csrf <!-- cria um hash de segurança -->

        @if (!empty($aluno->id))
            @method('PUT')
        @endif
        <input type="hidden" name="id" value="@if(!empty($aluno->id)){{$aluno->id}}@elseif (!empty(old('id'))){{old('id')}}@else{{''}}@endif">
        <label for="">Nome</label><br>
        <input type="text" name="nome"
            value="@if (!empty($aluno->nome)) {{$aluno->nome}} @elseif(!empty(old('nome'))) {{old('nome')}} @else {{''}} @endif">
        <br><br>
        <label for="">Data Nascimento</label><br>
        <input type="text" name="data_nascimento"
            value="@if(!empty($aluno->data_nascimento)) {{$aluno->data_nascimento}} @elseif (!empty(old('data_nascimento'))){{old('data_nascimento')}}@else{{''}}@endif">
        <br><br>
        <label for="">CPF</label><br>
        <input type="text" name="cpf"
          value=" @if(!empty($aluno->cpf)){{$aluno->cpf}}@elseif(!empty(old('cpf'))){{old('cpf')}}@else{{''}}@endif"><br><br>
        <label for="">Email</label><br>
        <input type="email" name="email"
            value="@if (!empty($aluno->email)){{$aluno->email}}@elseif(!empty(old('email'))) {{old('email')}} @else{{''}}@endif"><br><br>
        <label for="">Telefone</label><br>
        <input type="text" name="telefone"
            value="@if (!empty(old('telefone'))){{old('telefone')}}@elseif(!empty($aluno->telefone)){{$aluno->telefone}}@else{{''}}@endif"><br><br>
        <button type="submit">Salvar</button><br>
        <a href="{{ route('aluno.index') }}">Voltar</a>
    </form>
</body>
</html>

