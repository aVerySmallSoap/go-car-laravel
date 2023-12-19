<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('/css/generic-form-style.css')}}">
    <title>Add Leaser</title>
</head>
<body>

    <div class="grid">
        <div class="design-container">
            <div class="container">
                <div class="inner-container">
                    <form id="form-leaser-create">
                        @csrf
                        <div class="form-row">
                            <label for="leaser_name">Name:</label>
                            <input type="text" id="leaser_name" name="name">
                        </div>
                        <div class="form-row">
                            <label for="leaser_age">Age:</label>
                            <input type="number" id="leaser_age" name="age">
                        </div>
                        <div class="form-row">
                            <label for="leaser_address">Address:</label>
                            <input type="text" id="leaser_address" name="address">
                        </div>
                        <div class="form-row">
                            <label for="leaser_conNo">Contact Number:</label>
                            <input type="number" id="leaser_conNo" name="contact">
                        </div>
                        <div class="form-control">
                            <button type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/js/leasers/create.js')}}"></script>
    <script src="{{asset('/js/vehicles/sendRequest.js')}}"></script>

</body>
</html>
