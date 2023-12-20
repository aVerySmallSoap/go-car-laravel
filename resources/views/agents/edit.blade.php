<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token", content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('/css/generic-form-style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/input-error.css')}}">
    <title>Edit Agent</title>
</head>
<body>
@php($data = $data->attributesToArray())

    <div class="grid">
        <div class="design-container">
            <div class="container">
                <div class="inner-container">
                    <h2 class="title">Edit Agent</h2>
                    <form id="form-agent-edit">
                        <div class="form-row">
                            <label for="form-agent-id">ID:</label>
                            <input type="text" id="form-agent-id" name="id" value="{{$data['agent_id']}}" readonly>
                        </div>
                        <div class="form-row">
                            <label for="form-agent-name">Name:</label>
                            <input type="text" id="form-agent-name" name="name" value="{{$data['agent_name']}}">
                        </div>
                        <div class="form-row">
                            <label for="form-agent-age">Age:</label>
                            <input type="number" id="form-agent-age" name="age" value="{{$data['agent_age']}}">
                        </div>
                        <div class="form-row">
                            <label for="form-agent-address">Address:</label>
                            <input type="text" id="form-agent-address" name="address" value="{{$data['agent_address']}}">
                        </div>
                        <div class="form-control">
                            <button type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/js/agents/edit.js')}}"></script>
    <script src="{{asset('/js/inputValidation/validate_input.js')}}"></script>
</body>
</html>
