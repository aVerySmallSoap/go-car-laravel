<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/generic-table-style.css')}}">
    <title>Receipts</title>
</head>
<body>

    <div class="container-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pre-trip ID</th>
                    <th>Post-trip ID</th>
                    <th>Customer</th>
                    <th>Agent</th>
                    <th>Type</th>
                    <th>Plate Number</th>
                    <th>Destination</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $element)
                    <tr>
                        <td>{{$element->receipt_ID}}</td>
                        <td>{{$element->pretrip_ID}}</td>
                        <td>{{$element->posttrip_ID}}</td>
                        <td>{{$element->customer_name}}</td>
                        <td>{{$element->agent_name}}</td>
                        <td>{{$element->vehicle_type}}</td>
                        <td>{{$element->vehicle_plateNo}}</td>
                        <td>{{$element->pretrip_destination}}</td>
                        <td>{{$element->receipt_total}}</td>
                        <td>
                            <form action="">
                                <button>Details</button>
                                <button>Print</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
