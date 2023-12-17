<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Vehicle</title>
</head>
<body>

<form id="form-car-edit">
    @csrf
    <div class="form-row">
        <label for="form-car-plateNo">Plate Number:</label>
        <input type="text" id="form-car-plateNo" name="plateNo" value="{{$data['vehicle_plateNo']}}">
    </div>
    <div class="form-row">
        <label for="form-car-model">Model:</label>
        <input type="text" id="form-car-model" name="model" value="{{$data['vehicle_model']}}">
    </div>
    <div class="form-row">
        <label for="form-car-type">Type:</label>
        <input type="text" id="form-car-type" name="type" value="{{$data['vehicle_type']}}" readonly>
    </div>
    <div class="form-row">
        <label for="form-car-color">Color:</label>
        <input type="text" id="form-car-color" name="color" value="{{$data['vehicle_color']}}">
    </div>
    <div class="form-row">
        <label>Availability:</label>
        <label for="form-car-availability-true">True</label>
        <input type="radio" id="form-car-availability-true" name="availability" value="1" checked>
        <label for="form-car-availability-false">False</label>
        <input type="radio" id="form-car-availability-false" name="availability" value="0">
    </div>
    <div class="form-row">
        <label for="form-car-rent">Rent Price:</label>
        <input type="number" id="form-car-rent" name="rent" value="{{$data['vehicle_rentPrice']}}">
    </div>
    <div class="form-row">
        <label for="form-car-leaser">Leaser:</label>
        <select name="leaser" id="form-car-leaser">
            @foreach($leasers as $choice)
                <option value="{{$choice['leaser_name']}}">{{$choice['leaser_name']}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control">
        <button type="submit">Update</button>
    </div>
</form>

<script src="{{asset('/js/vehicles/edit.js')}}"></script>
<script src="{{asset('/js/vehicles/sendRequest.js')}}"></script>
</body>
</html>
