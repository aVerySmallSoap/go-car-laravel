<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/generic-table-style.css')}}">
    <title>Document</title>
</head>
<body>

    <h1>Motorcycles</h1>
    <button onclick="window.location.href='{{ route('vehicles.motorcycles.create')}}'">Add</button>

    <div class="container-table">
        <table>
            <thead>
            <tr>
                <th>Plate Number</th>
                <th>Name</th>
                <th>Type</th>
                <th>Color</th>
                <th>Availability</th>
                <th>Rent Price</th>
                <th>Owner</th>
                <th>Actions</th>
            </tr>
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
                                "/car/edit/{{$element->getAttribute($element->getKeyName())}}">
                                Edit</button>
                            <button type="submit" formmethod="get" formaction=
                                "/car/delete/{{$element->getAttribute($element->getKeyName())}}">
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
