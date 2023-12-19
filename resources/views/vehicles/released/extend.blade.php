@php $data = $data->attributesToArray(); @endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('/css/extend-style.css')}}">
    <title>Something</title>
</head>
<body>

    <h3>Extend date for: {{$data['customer_name']}}</h3>
    <div class="container">
        <h4>Details</h4>
        <div class="inner-container">
            <span>Receipt ID:</span>
            <span data-mark-important data-mark-label="id" data-value="{{$data['pretrip_ID']}}">
            {{$data['pretrip_ID']}}
            </span>
            <span>Release ID:</span>
            <span data-mark-important data-mark-label="ulid" data-value="{{$ulid}}">
            {{$ulid}}
            </span>
            <span>Plate Number:</span>
            <span data-mark-important data-mark-label="plateNo" data-value="{{$data['vehicle_plateNo']}}">
            {{$data['vehicle_plateNo']}}
            </span>
            <span>Type:</span>
            <span data-mark-important data-mark-label="type" data-value="{{$data['vehicle_type']}}">
            {{$data['vehicle_type']}}
            </span>
            <span>Cost:</span>
            <span data-mark-important data-mark-label="cost" data-value="{{$cost}}">
            {{$cost}} P
            </span>
            <span>Original date:</span>
            <span data-mark-important data-mark-label="original-date" data-value="{{$data['pretrip_dateend']}}">
            {{date_create($data['pretrip_dateend'])->format('Y-m-d h:i:s A')}}
            </span>
        </div>
        <form id="form-extension">
            <div class="form-row">
                <label for="form-extension-new-date">New return date:</label>
                <input type="datetime-local" name="new-date" id="form-extension-new-date">
            </div>
            <div class="form-control">
                <button type="submit">Extend</button>
            </div>
        </form>
    </div>

    <script src="{{asset('/js/vehicles/released/sendFormRequest.js')}}"></script>
</body>
</html>
