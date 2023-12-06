<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <title>Test</title>
</head>
<body>

    <h3>GENERATE A RECEIPT</h3>

    <form action="">
        {{-- Customer --}}
        <div id="container-customer">
            <label for="pre-receipt-customer">Select customer: </label>
            <select name="customer" id="pre-receipt-customer">
                <option value="" disabled selected>Please select a customer</option>
                @foreach($customers as $customer)
                    @php($customer = $customer->attributesToArray())
                    <option value="{{$customer['customer_name']}}">{{$customer['customer_name']}}</option>
                @endforeach
            </select>
            <div class="content-information">
                <div>
                    <span>ID:</span>
                    <span data-fillable="true"></span>
                </div>
                <div>
                    <span>Agent:</span>
                    <span data-fillable="true"></span>
                </div>
                <div>
                    <span>Name:</span>
                    <span data-fillable="true"></span>
                </div>
                <div>
                    <span>Age:</span>
                    <span data-fillable="true"></span>
                </div>
                <div>
                    <span>Contact Number:</span>
                    <span data-fillable="true"></span>
                </div>
            </div>
            <hr>
        </div>
        <div id="container-vehicle">
            <div>
                <label for="pre-receipt-vehicle-type">Vehicle Type:</label>
                <select name="type" id="pre-receipt-vehicle-type">
                    <option value="" disabled selected>Please select a type</option>
                    <option value="Car">Car</option>
                    <option value="Motorcycle">Motorcycle</option>
                </select>
                <label for="pre-receipt-vehicle">Select vehicle: </label>
                <select name="vehicle" id="pre-receipt-vehicle" disabled>
                    <option value="" disabled selected>Please select a vehicle</option>
                </select>
            </div>
            <div class="content-information">
                <div>
                    <span>Plate Number:</span>
                    <span data-fillable="true"></span>
                </div>
                <div>
                    <span>Type:</span>
                    <span data-fillable="true"></span>
                </div>
                <div>
                    <span>Model:</span>
                    <span data-fillable="true"></span>
                </div>
                <div>
                    <span>Color:</span>
                    <span data-fillable="true"></span>
                </div>
            </div>
            <hr>
        </div>
        <div class="form-row pre-optionals">
            {{-- Optional things to add --}}
            <div class="optionals-gas">
                <span>Gas:</span><br>
                <label for="pre-optional-gas-liter">Litres:</label>
                <input type="number" id="pre-optional-gas-liter" value="0">
                <label for="pre-optional-gas-price">Price:</label>
                <input type="number" id="pre-optional-gas-price" value="20">
            </div>
        </div>
    </form>

    <script src="{{asset('/js/generators/pretrip/refreshOnSelect.js')}}"></script>

</body>
</html>
