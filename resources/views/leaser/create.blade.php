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

    <form method="POST" action="/leaser">
        @csrf
        <label for="leaser_name">Name:</label>
        <input type="text" id="leaser_name" name="name">
        <label for="leaser_age">Age:</label>
        <input type="number" id="leaser_age" name="age">
        <label for="leaser_address">Address:</label>
        <input type="text" id="leaser_address" name="address">
        <label for="leaser_conNo">Contact Number:</label>
        <input type="number" id="leaser_conNo" name="contact">
        <button type="submit">Create</button>
    </form>

</body>
</html>
