@php(date_default_timezone_set('Asia/Manila'))
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/generic-table-style.css')}}">
    <title>Released</title>
</head>
<body>

<div class="container-table">
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Pretrip ID</th>
            <th>Plate Number</th>
            <th>Model</th>
            <th>Customer Name</th>
            <th>Return Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $element)
            <tr>
                <td>{{$element->released_ID}}</td>
                <td>{{$element->pretrip_ID}}</td>
                <td>{{$element->vehicle_plateNo}}</td>
                <td>{{$element->vehicle_model}}</td>
                <td>{{$element->customer_name}}</td>
                <td>{{date_create($element->pretrip_dateend)->format('Y-m-d h:i:s A')}}</td>
                <td>
                    <form method="get">
                        {{--Receive all details about released vehicle--}}
                        <button type="submit" formmethod="get" formaction=
                            "">
                            Details</button>
                        <button type="submit" formmethod="get" formaction=
                            "/released/extend/{{$element->released_ID}}/{{$element->pretrip_ID}}/{{$element->vehicle_type}}/{{$element->pretrip_dateend}}">
                            Extend</button>
                        <button type="submit" formmethod="get" formaction=
                            "/generate/post-trip/{{$element->pretrip_ID}}">
                            Return</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
