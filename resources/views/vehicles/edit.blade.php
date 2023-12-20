<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/generic-form-style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/input-error.css')}}">
    <title>Edit Vehicle</title>
</head>
<body>

    <div class="grid">
        <div class="design-container">
            <div class="container">
                <div class="inner-container">
                    <h2 class="title">Edit a vehicle</h2>
                    <form id="form-vehicle-edit">
                        @csrf
                        <div class="form-row">
                            <label for="form-vehicle-plateNo">Plate Number:</label>
                            <input type="text" id="form-vehicle-plateNo" name="plateNo" value="{{$data['vehicle_plateNo']}}">
                        </div>
                        <div class="form-row">
                            <label for="form-vehicle-model">Model:</label>
                            <input type="text" id="form-vehicle-model" name="model" value="{{$data['vehicle_model']}}">
                        </div>
                        <div class="form-row">
                            <label for="form-vehicle-type">Type:</label>
                            <input type="text" id="form-vehicle-type" name="type" value="{{$data['vehicle_type']}}" readonly>
                        </div>
                        <div class="form-row">
                            <label for="form-vehicle-color">Color:</label>
                            <input type="text" id="form-vehicle-color" name="color" value="{{$data['vehicle_color']}}">
                        </div>
                        <div class="form-row">
                            <label>Availability:</label>
                            <label for="form-vehicle-availability-true">True</label>
                            <input type="radio" id="form-vehicle-availability-true" name="availability" value="1" checked>
                            <label for="form-vehicle-availability-false">False</label>
                            <input type="radio" id="form-vehicle-availability-false" name="availability" value="0">
                        </div>
                        <div class="form-row">
                            <label for="form-vehicle-rent">Rent Price:</label>
                            <input type="number" id="form-vehicle-rent" name="rent" value="{{$data['vehicle_rentPrice']}}">
                        </div>
                        <div class="form-row">
                            <label for="form-vehicle-leaser">Leaser:</label>
                            <select name="leaser" id="form-vehicle-leaser">
                                @foreach($leasers as $choice)
                                    <option value="{{$choice['leaser_name']}}">{{$choice['leaser_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-control">
                            <button type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('/js/vehicles/edit.js')}}"></script>
    <script src="{{asset('/js/vehicles/sendRequest.js')}}"></script>
    <script src="{{asset('/js/inputValidation/validate_input.js')}}"></script>
</body>
</html>
