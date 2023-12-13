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

<div class="container-table">
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Plate No</th>
            <th>Customer Name</th>
            <th>Receipt ID</th>
            <th>Reservation Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $element)
            <tr>
                <td>{{$element->vehicle_plateNo}}</td>
                <td>{{$element->vehicle_name}}</td>
                <td>{{$element->vehicle_type}}</td>
                <td>{{$element->vehicle_color}}</td>
                <td>{{$element->leaser_name}}</td>
                <td>
                    <form method="POST">
                        <button type="submit" formmethod="get" formaction=
                            "/{{mb_strtolower($element->vehicle_type)}}/edit/{{$element->vehicle_plateNo}}">
                            Edit</button>
                        <button type="submit" formmethod="get" formaction=
                            "/{{mb_strtolower($element->vehicle_type)}}/delete/{{$element->vehicle_plateNo}}">
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
