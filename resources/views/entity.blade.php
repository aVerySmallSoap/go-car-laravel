<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/generic-table-style.css')}}">
    <title>Document</title>
</head>
<body>

    <h1>{{$entity}}</h1>
    <button onclick="window.location.href='{{ route('leaser.create')}}'">Add</button>

    <div class="container-table">
        <table>
            <thead>
            @foreach(array_keys($data[0]->attributesToArray()) as $headers)
                <th>{{explode('_', $headers)[1]}}</th>
            @endforeach
            <th>Actions</th>
            </thead>
            <tbody>
            @foreach($data as $element)
                <tr>
                    @foreach($element->attributesToArray() as $displayable)
                        <td>{{$displayable}}</td>
                    @endforeach
                    <td>
                        <form method="POST">

                            <button type="submit" formmethod="get" formaction=
                                "/{{preg_split('/[s]$/', strtolower($entity))[0]}}/{{$element->getAttribute($element->getKeyName())}}">
                                View</button>
                            <button type="submit" formmethod="get" formaction=
                                "/{{preg_split('/[s]$/', strtolower($entity))[0]}}/delete/{{$element->getAttribute($element->getKeyName())}}">
                                Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
