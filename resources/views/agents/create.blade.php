<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('/css/generic-form-style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/input-error.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Leaser</title>
</head>
<body>

    <div class="grid">
        <div class="design-container">
            <div class="container">
                <div class="inner-container">
                    <h2 class="title">Add Agent</h2>
                    <form id="form-agent-create">
                        @csrf
                        <div class="form-row">
                            <label for="agent_name">Name:</label>
                            <input type="text" id="agent_name" name="name">
                        </div>
                        <div class="form-row">
                            <label for="agent_age">Age:</label>
                            <input type="number" id="agent_age" name="age">
                        </div>
                        <div class="form-row">
                            <label for="agent_address">Address:</label>
                            <input type="text" id="agent_address" name="address">
                        </div>
                        <div class="form-control">
                            <button type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/js/agents/create.js')}}"></script>
    <script src="{{asset('/js/vehicles/sendRequest.js')}}"></script>
    <script src="{{asset('/js/inputValidation/validate_input.js')}}"></script>

</body>
</html>
