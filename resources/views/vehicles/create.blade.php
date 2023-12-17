<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Vehicle</title>
</head>
<body>

<form id="form-vehicle-create">
    @csrf
    <div class="form-row">
        <label for="form-vehicle-plateNo">Plate Number:</label>
        <input type="text" id="form-vehicle-plateNo" name="plateNo">
    </div>
    <div class="form-row">
        <label for="form-vehicle-model">Model:</label>
        <input type="text" id="form-vehicle-model" name="model">
    </div>
    <div class="form-row">
        <label for="form-vehicle-type">Type:</label>
        <select name="type" id="form-vehicle-type">
            <option value="Car">Car</option>
            <option value="Motorcycle">Motorcycle</option>
        </select>
    </div>
    <div class="form-row">
        <label for="form-vehicle-color">Color:</label>
        <input type="text" id="form-vehicle-color" name="color">
    </div>
    <div class="form-row">
        <label>Availability:</label>
        <label for="form-vehicle-availability-true">True</label>
        <input type="radio" id="form-vehicle-availability-true" name="availability" value="1" checked>
        <label for="form-vehicle-availability-false">False</label>
        <input type="radio" id="form-vehicle-availability-false" name="availability" value="0">
    </div>
    <div class="form-row">
        <label for="form-vehicle-rent-price">Rent price:</label>
        <input type="number" id="form-vehicle-rent-price" name="rent">
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
        <button type="submit">Create</button>
    </div>
</form>
<script src="{{asset('/js/vehicles/create.js')}}"></script>
<script src="{{asset('/js/vehicles/sendRequest.js')}}"></script>
</body>
</html>
