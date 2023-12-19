@php
    date_default_timezone_set('Asia/Manila');
@endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('/css/receipt-style.css')}}">
    <title>View {{$data['receipt_ID']}}</title>
</head>
<body>
@php($data = $data->attributesToArray())
<h3>Generate A post-report</h3>
<div class="container">
    <h4>Details</h4>
    <div class="span-row">
        <span>Receipt ID:</span>
        <span data-mark-important data-mark-label="pretrip-id" data-value="{{$data['receipt_ID']}}">
            {{$data['receipt_ID']}}
        </span>
    </div>
    <div class="span-row">
        <span>Pre-trip ID:</span>
        <span data-mark-important data-mark-label="pretrip-id" data-value="{{$data['pretrip_ID']}}">
            {{$data['pretrip_ID']}}
        </span>
    </div>
    <div class="span-row">
        <span>Initial Fuel Levels:</span>
        <span data-mark-important data-mark-label="pretrip-initial-gas" data-value="{{$data['pretrip_initialGas']}}">
            {{$data['pretrip_initialGas']}}
        </span>
    </div>
    <div class="span-row">
        <span>Fuel Requested:</span>
        <span data-mark-important data-mark-label="pretrip-request-gas" data-value="{{$data['pretrip_requestGasLiters']}}">
            {{$data['pretrip_requestGasLiters']}}
        </span>
    </div>
    <div class="span-row">
        <span>Fuel Price:</span>
        <span data-mark-important data-mark-label="pretrip-request-gas-price" data-value="{{$data['pretrip_requestGasLiters']}}">
            {{$data['pretrip_requestGasPrice']}}
        </span>
    </div>
    <div class="span-row">
        <span>Requested with car wash:</span>
        <span data-mark-important data-mark-label="pretrip-request-wash" data-value="{{$data['pretrip_requestWash']}}">
            {{($data['pretrip_requestWash'] == 1) ? "YES": "NO"}}
        </span>
    </div>
    <div class="span-row">
        <span>Requested with helmet:</span>
        <span data-mark-important data-mark-label="pretrip-request-helmet" data-value="{{$data['pretrip_requestHelmet']}}">
            {{($data['pretrip_requestHelmet'] == 1) ? "YES": "NO"}}
        </span>
    </div>
</div>
<div class="container">
    <h4>Post-rental information</h4>
    <div class="span-row">
        <span>Post-trip ID:</span>
        <span data-mark-important data-mark-label="posttrip-id" data-value="{{$data['posttrip_ID']}}">
            {{$data['posttrip_ID']}}
        </span>
    </div>
    <div class="span-row">
        <span>Fuel Level on return:</span>
        <span data-mark-important data-mark-label="posttrip-gas" data-value="{{$data['posttrip_gasBar']}}">
            {{$data['posttrip_gasBar']}}
        </span>
    </div>
    <div class="span-row">
        <span>Damages/Optionals Costs:</span>
        <span data-mark-important data-mark-label="posttrip-optional" data-value="{{$data['posttrip_optionalCost']}}">
            {{$data['posttrip_optionalCost']}}
        </span>
    </div>
</div>
<div class="container">
    <h4>Information</h4>
    <div class="span-row">
        <span>Name:</span>
        <span data-mark-important data-mark-label="customer" data-value="{{$data['customer_name']}}">
            {{$data['customer_name']}}
        </span>
    </div>
    <div class="span-row">
        <span>Agent:</span>
        <span data-mark-important data-mark-label="agent" data-value="{{$data['agent_name']}}">
            {{$data['agent_name']}}
        </span>
    </div>
    <div class="span-row">
        <span>Location:</span>
        <span data-mark-important data-mark-label="pretrip-destination" data-value="{{$data['pretrip_destination']}}">
            {{$data['pretrip_destination']}}
        </span>
    </div>
    <div class="span-row">
        <span>Vehicle:</span>
        <span data-mark-important data-mark-label="vehicle-type" data-value="{{$data['vehicle_type']}}">
            {{$data['vehicle_type']}}
        </span>
    </div>
    <div class="span-row">
        <span>Vehicle:</span>
        <span data-mark-important data-mark-label="vehicle-plateNo" data-value="{{$data['vehicle_plateNo']}}">
            {{$data['vehicle_plateNo']}}
        </span>
    </div>
    <div class="span-row">
        <span>Return due:</span>
        <span data-mark-important data-mark-label="pretrip-date-end" data-value="{{$data['pretrip_dateend']}}">
            {{date_create($data['pretrip_dateend'])->format('Y-m-d h:i:s A')}}
        </span>
    </div>
    <div class="span-row">
        <span>Return date:</span>
        <span data-mark-important data-mark-label="posttrip-return-date" data-value="{{$data['posttrip_returnDate']}}">
            {{date_create($data['posttrip_returnDate'])->format('Y-m-d h:i:s A')}}
        </span>
    </div>
    <div class="span-row">
        <span>Hour deficit:</span>
        <span data-mark-important data-mark-label="receipt-hours" data-value="{{$data['receipt_hourDeficit']}}">
            {{$data['receipt_hourDeficit']}}
        </span>
    </div>
    <div class="span-row">
        <span>Deficit cost:</span>
        <span data-mark-important data-mark-label="receipt-hours-cost" data-value="{{$data['receipt_hourCostDeficit']}}">
            {{$data['receipt_hourCostDeficit']}}
        </span>
    </div>
    <div class="span-row">
        <span>Total:</span>
        <span data-mark-important data-mark-label="receipt-total" data-value="{{$data['receipt_total']}}">
            {{$data['receipt_total']}}
        </span>
    </div>
    <form id="form-receipt">
        <div class="form-control">
            <button type="submit" formaction="/receipts">Back</button>
        </div>
    </form>
</div>


</body>
</html>
