<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-2">
        <h2 class="text-center mb-2">{{$title}}</h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Data Nascimento</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos ?? '' as $item)
                @php
                   $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.jpg';
                   $srcImagem = public_path()."/storage/".$nome_imagem;
                @endphp
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td class="h-32 w-32 object-cover rounded-full"><img src="{{$srcImagem}}" width="100px"
                        alt="imagem"></td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->cpf }}</td>
                    <td>{{ $item->telefone }}</td>
                    <td>{{ date('d/m/Y', strtotime($item->data_nascimento)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
