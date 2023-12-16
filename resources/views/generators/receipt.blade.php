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
        <span>{{$pretrip['pretrip_ID']}}</span>
    </div>
    <div class="span-row">
        <span>Initial Fuel Levels:</span>
        <span>{{$pretrip['pretrip_initialGas']}}</span>
    </div>
    <div class="span-row">
        <span>Fuel Requested:</span>
        <span>{{$pretrip['pretrip_requestGasLiters']}}</span>
    </div>
    <div class="span-row">
        <span>Fuel Price:</span>
        <span>{{$pretrip['pretrip_requestGasPrice']}}</span>
    </div>
    <div class="span-row">
        <span>Requested with car wash:</span>
        <span>
            {{($pretrip['pretrip_requestWash'] == 1) ? "YES": "NO"}}
        </span>
    </div>
    <div class="span-row">
        <span>Requested with helmet:</span>
        <span>
            {{($pretrip['pretrip_requestHelmet'] == 1) ? "YES": "NO"}}
        </span>
    </div>
</div>
<hr>
<h4>Post-rental information</h4>
<div class="container">
    <div class="span-row">
        <span>Post-trip ID:</span>
        <span>{{$post_trip['posttrip_ID']}}</span>
    </div>
    <div class="span-row">
        <span>Fuel Level on return:</span>
        <span>{{$post_trip['posttrip_gasBar']}}</span>
    </div>
    <div class="span-row">
        <span>Damages/Optionals Costs:</span>
        <span>{{$post_trip['posttrip_optionalCost']}}</span>
    </div>
</div>
<hr>
<h4>Details</h4>
@dd($debt)

</body>
</html>
