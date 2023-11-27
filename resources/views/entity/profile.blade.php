<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>{{$entity}}</h1>

    <h3>
        {{$data->user_id}}
        {{$data->user_username}}
        {{$data->user_password}}
        {{$data->user_role}}
    </h3>

</body>
</html>
