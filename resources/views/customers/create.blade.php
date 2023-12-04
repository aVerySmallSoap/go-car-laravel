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

    <form method="POST" action="{{route('customers.store')}}">
        @csrf
        <label for="agent_name">Agent Name:</label>
        <select name="agent" id="agent_name">
            @foreach($agents as $agent)
                <option value="{{$agent->agent_name}}">{{$agent->agent_name}}</option>
            @endforeach
        </select>
        <label for="customer_name">Name:</label>
        <input type="text" id="customer_name" name="name">
        <label for="customer_age">Age:</label>
        <input type="number" id="customer_age" name="age">
        <label for="customer_civilStatus">Civil Status:</label>
        <select name="civil" id="customer_civilStatus">
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Widowed">Widowed</option>
            <option value="Separated">Separated</option>
        </select>
        <label for="customer_contactNo">Contact Number:</label>
        <input type="text" id="customer_contactNo" name="contact">
        <label for="customer_facebook">Facebook URL:</label>
        <input type="url" id="customer_facebook" name="facebook">
        <button type="submit">Create</button>
    </form>

</body>
</html>
