<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('/css/pretrip-gen-style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/input-error.css')}}">
    <title>Pre Trip Generation</title>
</head>
<body>

    <h3>Generate A pre-report</h3>

    <div class="container">
        <form id="form-pre-receipt">
            <div id="container-customer">
                <label for="pre-receipt-customer">Select customer: </label>
                <select name="customer" id="pre-receipt-customer">
                    <option value="" disabled selected>Please select a customer</option>
                    @foreach($customers as $customer)
                        @php($customer = $customer->attributesToArray())
                        <option value="{{$customer['customer_name']}}">{{$customer['customer_name']}}</option>
                    @endforeach
                </select>
                <label for="pre-receipt-valid-identification">Select valid ID type: </label>
                <select name="validIdentification" id="pre-receipt-valid-identification">
                    <option value="" disabled selected>Please select a valid ID type</option>
                    <option value="Drivers License">Driver's License</option>
                    <option value="National ID">National ID</option>
                    <option value="SSS">Social Security</option>
                </select>
                <div class="content-information">
                    <div>
                        <span>ID:</span>
                        <span data-fillable="true" ></span>
                    </div>
                    <div>
                        <span>Agent:</span>
                        <span data-fillable="true" data-mark-important data-mark-label="agent_name"></span>
                    </div>
                    <div>
                        <span>Name:</span>
                        <span data-fillable="true" data-mark-important data-mark-label="customer_name"></span>
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
                        <span data-fillable="true" data-mark-important data-mark-label="vehicle_plateNo"></span>
                    </div>
                    <div>
                        <span>Model:</span>
                        <span data-fillable="true"></span>
                    </div>
                    <div>
                        <span>Type:</span>
                        <span data-fillable="true" data-mark-important data-mark-label="vehicle_type"></span>
                    </div>
                    <div>
                        <span>Color:</span>
                        <span data-fillable="true"></span>
                    </div>
                    <div>
                        <span>Rent price:</span>
                        <span data-fillable="true" data-mark-important data-mark-label="vehicle_rentPrice"></span>
                    </div>
                </div>
            </div>
            <div id="container-important">
                <div class="form-row">
                    <label for="pre-receipt-destination">Destination:</label>
                    <input type="text" id="pre-receipt-destination" name="destination">
                </div>
                <div class="form-row">
                    <label for="pre-receipt-destination-price">Destination price:</label>
                    <input type="number" id="pre-receipt-destination-price" name="destination-price">
                </div>
                <div class="form-row">
                    <label for="pre-receipt-start-date">Rent start:</label>
                    <input type="datetime-local" id="pre-receipt-start-date" name="start-date">
                </div>
                <div class="form-row">
                    <label for="pre-receipt-end-date">Rent end:</label>
                    <input type="datetime-local" id="pre-receipt-end-date" name="end-date">
                </div>
                <div class="form-row">
                    <label for="pre-receipt-initial-gas">Gas levels:</label>
                    <input type="number" id="pre-receipt-initial-gas" name="initial-gas" placeholder="0">
                </div>
            </div>
            <div class="form-row pre-optionals">
                <div class="optionals-gas">
                    <label for="pre-optional-gas-liter"> Gas Litres:</label>
                    <input type="number" id="pre-optional-gas-liter" name="gas" placeholder="0">
                    <label for="pre-optional-gas-price">Price:</label>
                    <input type="number" id="pre-optional-gas-price" name="gas_price" placeholder="0">
                </div>
                <div>
                    <label for="pre-optional-helmet">Helmet:</label>
                    <input type="checkbox" id="pre-optional-helmet" name="helmet" value="1">
                </div>
                <div>
                    <label for="pre-optional-wash">Car wash:</label>
                    <input type="checkbox" id="pre-optional-wash" name="wash" value="1">
                </div>
            </div>
            <div class="form-control">
                <button type="submit">Generate</button>
            </div>
        </form>
    </div>



    <script src="{{asset('/js/generators/pretrip/sendFormRequest.js')}}"></script>
    <script src="{{asset('/js/generators/pretrip/refreshOnSelect.js')}}"></script>
    <script src="{{asset('/js/inputValidation/validate_input.js')}}"></script>
</body>
</html>
