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
            <th>Pretrip ID</th>
            <th>Agent</th>
            <th>Customer</th>
            <th>Return Date</th>
            <th>Initial Gas Levels</th>
            <th>Comments</th>
            <th>Optional Costs</th>
            <th>Total</th>
            <th>Created At</th>
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
                    <form>
                        <button type="submit" formmethod="get" formaction="/generate/receipt/{{$element['pretrip_ID']}}">
                            Generate a receipt
                        </button>
                        <button type="submit" formmethod="get" formaction="">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
