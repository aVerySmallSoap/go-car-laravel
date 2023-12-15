<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Something</title>
</head>
<body>

    <h4>Details</h4>
    <div class="container">
        <span>Type: {{$type}}</span><br>
        <span>Cost: {{$cost}} P</span><br>
        <span>Original date: {{date_create($date)->format('Y-m-d h:i:s A')}}</span><br>
    </div>

    <form id="form-extension" method="get" action="/released/extend">
        <div class="form-row">
            <label for="form-extension-new-date">New return date:</label>
            <input type="datetime-local" name="new-date" id="form-extension-new-date">
        </div>
        <div class="form-control">
            <button type="submit">Extend</button>
        </div>
    </form>

</body>
</html>
