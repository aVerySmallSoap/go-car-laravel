<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Motorcycle</title>
</head>
<body>

    <form id="form-motorcycle-edit">
        @csrf
        <div class="form-row">
            <label for="form-motorcycle-plateNo">Plate Number:</label>
            <input type="text" id="form-motorcycle-plateNo" name="plateNo" value="{{$data['motor_plateNo']}}" readonly>
        </div>
        <div class="form-row">
            <label for="form-motorcycle-name">Name:</label>
            <input type="text" id="form-motorcycle-name" name="name" value="{{$data['motor_model']}}">
        </div>
        <div class="form-row">
            <label for="form-motorcycle-type">Type:</label>
            <input type="text" id="form-motorcycle-type" name="type" value="{{$data['motor_type']}}">
        </div>
        <div class="form-row">
            <label for="form-motorcycle-color">Color:</label>
            <input type="text" id="form-motorcycle-color" name="color" value="{{$data['motor_color']}}">
        </div>
        <div class="form-row">
            <label>Availability:</label>
            <label for="form-motorcycle-availability-true">True</label>
            <input type="radio" id="form-motorcycle-availability-true" name="availability" value="1">
            <label for="form-car-availability-false">False</label>
            <input type="radio" id="form-motorcycle-availability-false" name="availability" value="0">
        </div>
        <div class="form-row">
            <label for="form-motorcycle-leaser">Leaser:</label>
            <select name="leaser" id="form-motorcycle-leaser">
                @foreach($leasers as $choice)
                    <option value="{{$choice['leaser_name']}}">{{$choice['leaser_name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-control">
            <button type="submit">Update</button>
        </div>
    </form>

    <script src="{{asset('/js/vehicles/motorcycles/edit.js')}}"></script>
    <script src="{{asset('/js/vehicles/editRequest.js')}}"></script>
</body>
</html>
