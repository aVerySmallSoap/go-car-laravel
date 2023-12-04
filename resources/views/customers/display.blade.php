<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/generic-table-style.css')}}">
    <title>Customers</title>
</head>
<body>

    <h1>Customers</h1>
    <button onclick="window.location.href='{{ route('customers.create')}}'">Add</button>

    <div class="container-table">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Agent</th>
                <th>Name</th>
                <th>Age</th>
                <th>Civil Status</th>
                <th>Contact Number</th>
                <th>Facebook</th>
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
                                "/agent/edit/{{$element->getAttribute($element->getKeyName())}}">
                                Edit</button>
                            <button type="submit" formmethod="get" formaction=
                                "/agent/delete/{{$element->getAttribute($element->getKeyName())}}">
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
