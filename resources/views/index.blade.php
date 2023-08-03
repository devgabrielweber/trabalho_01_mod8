<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Estou usando Laravel!</h3>
    <p>Bem vindo grande mestre: {{-- $nome --}}</p>
    @foreach ($pessoas as $item)
        @if($item->idade >18)
            <p>{{$item->nome}} - {{$item->idade}}</p>
        @endif
    @endforeach
</body>
</html>
