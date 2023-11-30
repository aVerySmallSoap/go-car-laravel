<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Car</title>
</head>
<body>

    <form id="form-car-edit">
        @csrf
        <div class="form-row">
            <label for="form-car-plateNo">Plate Number:</label>
            <input type="text" id="form-car-plateNo" name="plateNo" value="{{$data['car_plateNo']}}" readonly>
        </div>
        <div class="form-row">
            <label for="form-car-name">Name:</label>
            <input type="text" id="form-car-name" name="name" value="{{$data['car_name']}}">
        </div>
        <div class="form-row">
            <label for="form-car-type">Type:</label>
            <input type="text" id="form-car-type" name="type" value="{{$data['car_type']}}">
        </div>
        <div class="form-row">
            <label for="form-car-color">Color:</label>
            <input type="text" id="form-car-color" name="color" value="{{$data['car_color']}}">
        </div>
        <div class="form-row">
            <label>Availability:</label>
            <label for="form-car-availability-true">True</label>
            <input type="radio" id="form-car-availability-true" name="availability" value="1">
            <label for="form-car-availability-false">False</label>
            <input type="radio" id="form-car-availability-false" name="availability" value="0">
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

    <script src="{{asset('/js/vehicles/cars/edit.js')}}"></script>
</body>
</html>
