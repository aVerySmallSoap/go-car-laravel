<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Leaser</title>
</head>
<body>

    <form method="POST" action="{{route('agents.store')}}">
        @csrf
        <label for="agent_name">Name:</label>
        <input type="text" id="agent_name" name="name">
        <label for="agent_age">Age:</label>
        <input type="number" id="agent_age" name="age">
        <label for="agent_address">Address:</label>
        <input type="text" id="agent_address" name="address">
        <button type="submit">Create</button>
    </form>

</body>
</html>
