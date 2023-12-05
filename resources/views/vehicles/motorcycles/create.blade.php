<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Motorcycle</title>
</head>
<body>

    <form method="POST" id="form-motorcycle-create" action="{{route('vehicles.motorcycles.store')}}">
        @csrf
        <div class="form-row">
            <label for="form-motorcycle-plateNo">Plate Number:</label>
            <input type="text" id="form-motorcycle-plateNo" name="plateNo">
        </div>
        <div class="form-row">
            <label for="form-motorcycle-name">Name:</label>
            <input type="text" id="form-motorcycle-name" name="name">
        </div>
        <div class="form-row">
            <label for="form-motorcycle-type">Type:</label>
            <input type="text" id="form-motorcycle-type" name="type" value="Motorcycle" readonly>
        </div>
        <div class="form-row">
            <label for="form-motorcycle-color">Color:</label>
            <input type="text" id="form-motorcycle-color" name="color">
        </div>
        <div class="form-row">
            <label>Availability:</label>
            <label for="form-motorcycle-availability-true">True</label>
            <input type="radio" id="form-motorcycle-availability-true" name="availability" value="1">
            <label for="form-motorcycle-availability-false">False</label>
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
            <button type="submit">Create</button>
        </div>
    </form>

</body>
</html>
