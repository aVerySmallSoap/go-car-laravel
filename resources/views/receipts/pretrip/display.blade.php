<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/generic-table-style.css')}}">
    <title>Pre-trip Receipts</title>
</head>
<body>

<div class="container-table">
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Agent</th>
            <th>Customer</th>
            <th>Vehicle Type</th>
            <th>Vehicle Plate Number</th>
            <th>Valid ID Type</th>
            <th>Rent Start Date</th>
            <th>Rent End Date</th>
            <th>Destination</th>
            <th>Destination Cost</th>
            <th>Initial Gas</th>
            <th>Requested Gas</th>
            <th>Gas Price</th>
            <th>Washing</th>
            <th>Rented Helmet</th>
            <th>Total</th>
            <th>Date Created</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $element)
            <tr>
                @foreach($element->attributesToArray() as $displayable)
                    <td>{{$displayable}}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
