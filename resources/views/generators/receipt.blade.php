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
    <title>Post Trip Generation</title>
</head>

<body>
<h3>Generate A post-report</h3>
<h4>DETAILS</h4>
<h4>Pre-release information</h4>
<div class="container">
    <div class="span-row">
        <span>Pre-trip ID:</span>
        <span data-mark-important data-mark-label="pretrip-id" data-value="{{$pretrip['pretrip_ID']}}">
            {{$pretrip['pretrip_ID']}}
        </span>
    </div>
    <div class="span-row">
        <span>Initial Fuel Levels:</span>
        <span data-mark-important data-mark-label="pretrip-initial-gas" data-value="{{$pretrip['pretrip_initialGas']}}">
            {{$pretrip['pretrip_initialGas']}}
        </span
    </div>
    <div class="span-row">
        <span>Fuel Requested:</span>
        <span data-mark-important data-mark-label="pretrip-request-gas" data-value="{{$pretrip['pretrip_requestGasLiters']}}">
            {{$pretrip['pretrip_requestGasLiters']}}
        </span>
    </div>
    <div class="span-row">
        <span>Fuel Price:</span>
        <span data-mark-important data-mark-label="pretrip-request-gas-price" data-value="{{$pretrip['pretrip_requestGasLiters']}}">
            {{$pretrip['pretrip_requestGasPrice']}}
        </span>
    </div>
    <div class="span-row">
        <span>Requested with car wash:</span>
        <span data-mark-important data-mark-label="pretrip-request-wash" data-value="{{$pretrip['pretrip_requestWash']}}">
            {{($pretrip['pretrip_requestWash'] == 1) ? "YES": "NO"}}
        </span>
    </div>
    <div class="span-row">
        <span>Requested with helmet:</span>
        <span data-mark-important data-mark-label="pretrip-request-helmet" data-value="{{$pretrip['pretrip_requestHelmet']}}">
            {{($pretrip['pretrip_requestHelmet'] == 1) ? "YES": "NO"}}
        </span>
    </div>
</div>
<hr>
<h4>Post-rental information</h4>
<div class="container">
    <div class="span-row">
        <span>Post-trip ID:</span>
        <span data-mark-important data-mark-label="posttrip-id" data-value="{{$post_trip['posttrip_ID']}}">
            {{$post_trip['posttrip_ID']}}
        </span>
    </div>
    <div class="span-row">
        <span>Fuel Level on return:</span>
        <span data-mark-important data-mark-label="posttrip-gas" data-value="{{$post_trip['posttrip_gasBar']}}">
            {{$post_trip['posttrip_gasBar']}}
        </span>
    </div>
    <div class="span-row">
        <span>Damages/Optionals Costs:</span>
        <span data-mark-important data-mark-label="posttrip-optional" data-value="{{$post_trip['posttrip_optionalCost']}}">
            {{$post_trip['posttrip_optionalCost']}}
        </span>
    </div>
</div>
<hr>
<h4>Information</h4>
<div class="container">
    <div class="span-row">
        <span>Name:</span>
        <span data-mark-important data-mark-label="customer" data-value="{{$pretrip['customer_name']}}">
            {{$pretrip['customer_name']}}
        </span>
    </div>
    <div class="span-row">
        <span>Agent:</span>
        <span data-mark-important data-mark-label="agent" data-value="{{$pretrip['agent_name']}}">
            {{$pretrip['agent_name']}}
        </span>
    </div>
    <div class="span-row">
        <span>Location:</span>
        <span data-mark-important data-mark-label="pretrip-destination" data-value="{{$pretrip['pretrip_destination']}}">
            {{$pretrip['pretrip_destination']}}
        </span>
    </div>
    <div class="span-row">
        <span>Vehicle:</span>
        <span data-mark-important data-mark-label="vehicle-type" data-value="{{$pretrip['vehicle_type']}}">
            {{$pretrip['vehicle_type']}}
        </span>
    </div>
    <div class="span-row">
        <span>Vehicle:</span>
        <span data-mark-important data-mark-label="vehicle-plateNo" data-value="{{$pretrip['vehicle_plateNo']}}">
            {{$pretrip['vehicle_plateNo']}}
        </span>
    </div>
    <div class="span-row">
        <span>Return due:</span>
        <span data-mark-important data-mark-label="pretrip-date-end" data-value="{{$pretrip['pretrip_dateend']}}">
            {{date_create($pretrip['pretrip_dateend'])->format('Y-m-d h:i:s A')}}
        </span>
    </div>
    <div class="span-row">
        <span>Return date:</span>
        <span data-mark-important data-mark-label="posttrip-return-date" data-value="{{$post_trip['posttrip_returnDate']}}">
            {{date_create($post_trip['posttrip_returnDate'])->format('Y-m-d h:i:s A')}}
        </span>
    </div>
    <div class="span-row">
        <span>Hour deficit:</span>
        <span data-mark-important data-mark-label="receipt-hours" data-value="{{$hours}}">
            {{$hours}}
        </span>
    </div>
    <div class="span-row">
        <span>Deficit cost:</span>
        <span data-mark-important data-mark-label="receipt-hours-cost" data-value="{{$costByHour}}">
            {{$costByHour}}
        </span>
    </div>
    <div class="span-row">
        <span>Total:</span>
        <span data-mark-important data-mark-label="receipt-total" data-value="{{$total}}">
            {{$total}}
        </span>
    </div>
    <form id="form-receipt">
        <button type="submit">Generate</button>
    </form>
</div>

<script src="{{asset('/js/generators/receipt/sendFormRequest.js')}}"></script>

</body>
</html>
