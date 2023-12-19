<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('/css/pretrip-view-style.css')}}">
    <title>View {{$data['pretrip_ID']}}</title>
</head>
<body>
@php($data = $data->attributesToArray())
<h3>Details</h3>

<div class="container">
        <div class="inner-container">
            <div>
                <span>ID:</span>
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
                <span>Vehicle Type:</span>
                <span class="text-center">{{$data['vehicle_type']}}</span>
            </div>
            <div>
                <span>Plate Number:</span>
                <span class="text-center">{{$data['vehicle_plateNo']}}</span>
            </div>
            <div>
                <span>Valid ID Type:</span>
                <span class="text-center">{{$data['pretrip_typeOfID']}}</span>
            </div>
            <div>
                <span>Rent Start:</span>
                <span class="text-center">{{date_create($data['pretrip_datestart'])->format("Y-m-d h:i:s A")}}</span>
            </div>
            <div>
                <span>Rent End:</span>
                <span class="text-center">{{date_create($data['pretrip_dateend'])->format("Y-m-d h:i:s A")}}</span>
            </div>
            <div>
                <span>Destination:</span>
                <span class="text-center">{{$data['pretrip_destination']}}</span>
            </div>
            <div>
                <span>Destination Cost:</span>
                <span class="text-center">{{$data['pretrip_destinationPrice']}}</span>
            </div>
            <div>
                <span>Initial Fuel Levels:</span>
                <span class="text-center">{{$data['pretrip_initialGas']}}</span>
            </div>
            <div>
                <span>Requested Fuel:</span>
                <span class="text-center">{{$data['pretrip_requestGasLiters']}}</span>
            </div>
            <div>
                <span>Fuel Price:</span>
                <span class="text-center">{{$data['pretrip_requestGasPrice']}}</span>
            </div>
            <div>
                <span>Requested Wash:</span>
                <span class="text-center">
                    {{($data['pretrip_requestWash'] == 1) ? 'YES':'NO'}}
                </span>
            </div>
            <div>
                <span>Requested Helmet:</span>
                <span class="text-center">
                    {{($data['pretrip_requestHelmet'] == 1) ? 'YES':'NO'}}
                </span>
            </div>
            <div>
                <span>Total:</span>
                <span class="text-center">{{$data['pretrip_total']}}</span>
            </div>
            <div>
                <span>Created At:</span>
                <span class="text-center">{{date_create($data['pretrip_createdAt'])->format("Y-m-d h:i:s A")}}</span>
            </div>
        </div>
    <form id="form-pre-receipt">
        <div class="form-control">
            <button type="submit" formaction="/receipts/pre-trip">Back</button>
        </div>
    </form>
</div>

</body>
</html>
