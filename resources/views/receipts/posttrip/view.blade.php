<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('/css/pretrip-view-style.css')}}">
    <title>View {{$data['posttrip_ID']}}</title>
</head>
<body>
@php($data = $data->attributesToArray())
<h3>Details</h3>

<div class="container">
    <div class="inner-container">
        <div>
            <span>ID:</span>
            <span class="text-center">{{$data['posttrip_ID']}}</span>
        </div>
        <div>
            <span>Pre-trip ID:</span>
            <span class="text-center">{{$data['pretrip_ID']}}</span>
        </div>
        <div>
            <span>Agent:</span>
            <span class="text-center">{{$data['agent_name']}}</span>
        </div>
        <div>
            <span>Name:</span>
            <span class="text-center">{{$data['customer_name']}}</span>
        </div>
        <div>
            <span>Fuel levels on return:</span>
            <span class="text-center">{{$data['posttrip_gasBar']}}</span>
        </div>
        <div>
            <span>Return date:</span>
            <span class="text-center">{{date_create($data['posttrip_returnDate'])->format("Y-m-d h:i:s A")}}</span>
        </div>
        <div>
            <span>Optional costs:</span>
            <span class="text-center">
                    {{$data['posttrip_optionalCost']}}
                </span>
        </div>
        <div>
            <span>Total:</span>
            <span class="text-center">{{$data['posttrip_total']}}</span>
        </div>
        <div>
            <span>Created At:</span>
            <span class="text-center">{{date_create($data['posttrip_createdAt'])->format("Y-m-d h:i:s A")}}</span>
        </div>
        <div>
            <span>Damage/Notes:</span>
            <span class="text-center">
                    {{$data['posttrip_damageReport']}}
            </span>
        </div>
    </div>
    <form id="form-pre-receipt">
        <div class="form-control">
            <button type="submit" formaction="/receipts/post-trip">Back</button>
        </div>
    </form>
</div>

</body>
</html>
