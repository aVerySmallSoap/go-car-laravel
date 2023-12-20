@php
    date_default_timezone_set('Asia/Manila');
    $data = $pretrip->attributesToArray();
 @endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('/css/posttrip-gen-style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/input-error.css')}}">
    <title>Post Trip Generation</title>
</head>
<body>
    <h3>Generate A post-report</h3>
    <div class="container">
        <h4>Details</h4>
        <div class="inner-container">
            <div class="span-row">
                <span>Pre-trip ID:</span>
                <span data-mark-important data-mark-label="pretrip" data-value="{{$data['pretrip_ID']}}">
                {{$data['pretrip_ID']}}
            </span>
            </div>
            <div class="span-row">
                <span>Agent:</span>
                <span data-mark-important data-mark-label="agent" data-value="{{$data['agent_name']}}">
                {{$data['agent_name']}}
            </span>
            </div>
            <div class="span-row">
                <span>Customer:</span>
                <span data-mark-important data-mark-label="customer" data-value="{{$data['customer_name']}}">
                {{$data['customer_name']}}
            </span>
            </div>
            <div class="span-row">
                <span>Return Time:</span>
                <span data-mark-important data-mark-label="return-date" data-value="{{$return_date->format('Y-m-d h:i:s A')}}">
                {{$return_date->format('Y-m-d h:i:s A')}}
            </span>
            </div>
            <div class="span-row">
                <span>Initial Gas Levels:</span>
                <span data-mark-important data-mark-label="initial-gas" data-value="{{$data['pretrip_initialGas']}}">
                {{$data['pretrip_initialGas']}}
            </span>
            </div>
            <div class="span-row">
                <span>Vehicle model:</span>
                <span>
                {{$data['vehicle_plateNo']}}
            </span>
            </div>
            <div class="span-row">
                <span>License Type:</span>
                <span>
                {{$data['pretrip_typeOfID']}}
            </span>
            </div>
            <div class="span-row">
                <span>Destination:</span>
                <span>
                {{$data['pretrip_destination']}}
            </span>
            </div>
        </div>
    </div>
    <div class="container">
        <h4>Important</h4>
        <form id="form-post-receipt">
            <div class="form-row">
                <label for="form-post-receipt-gas">Gas Bar:</label>
                <input data-easy-input type="number" name="gas" id="form-post-receipt-gas" placeholder="0">
                <label for="form-post-receipt-gas-price">Price per bar deficit:</label>
                <input data-easy-input type="number" name="gas-price" id="form-post-receipt-gas-price" placeholder="0">
            </div>
            <div class="form-row">
                <label for="form-post-receipt-optional-cost">Optional/Damage Costs:</label>
                <input data-easy-input type="number" name="optional-cost" id="form-post-receipt-optional-cost" placeholder="0">
            </div>
            <div class="form-row">
                <label for="form-post-receipt-comment">Notes/Comments:</label>
                <textarea data-easy-input name="comment" id="form-post-receipt-comment" cols="15" rows="2" style="resize: none"></textarea>
            </div>
            <div class="form-control">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    <script src="{{asset('/js/generators/posttrip/sendFormRequest.js')}}"></script>
    <script src="{{asset('/js/inputValidation/validate_input.js')}}"></script>

</body>
</html>
