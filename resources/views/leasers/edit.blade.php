<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Leaser</title>
</head>
<body>

    <form id="form-leaser-edit">
        @csrf
        <div class="form-row">
            <label for="form-leaser-id">ID:</label>
            <input type="text" id="form-leaser-id" name="id" value="{{$data->leaser_id}}" readonly>
        </div>
        <div class="form-row">
            <label for="form-leaser-name">Name:</label>
            <input type="text" id="form-leaser-name" name="name" value="{{$data->leaser_name}}">
        </div>
        <div class="form-row">
            <label for="form-leaser-age">Age:</label>
            <input type="number" id="form-leaser-age" name="age" value="{{$data->leaser_age}}">
        </div>
        <div class="form-row">
            <label for="form-leaser-address">Address:</label>
            <input type="text" id="form-leaser-address" name="address" value="{{$data->leaser_address}}">
        </div>
        <div class="form-row">
            <label for="form-leaser-contact">Contact Number:</label>
            <input type="number" id="form-leaser-contact" name="contact" value="{{$data->leaser_contactNo}}">
        </div>
        <div class="form-control">
            <button type="submit">Update</button>
        </div>
    </form>

    <script src="{{asset('/js/leasers/editRequest.js')}}"></script>
</body>
</html>
