<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('/css/generic-form-style.css')}}">
    <title>Add Customer</title>
</head>
<body>

    <div class="grid">
        <div class="design-container">
            <div class="container">
                <div class="inner-container">
                    <h2 class="title">Add Customer</h2>
                    <form method="POST" action="{{route('customers.store')}}" id="form-customer-create">
                        @csrf
                        <div class="form-row">
                            <label for="agent_name">Agent Name:</label>
                            <select name="agent" id="agent_name">
                                @foreach($agents as $agent)
                                    <option value="{{$agent->agent_name}}">{{$agent->agent_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="customer_name">Name:</label>
                            <input type="text" id="customer_name" name="name">
                        </div>
                        <div class="form-row">
                            <label for="customer_age">Age:</label>
                            <input type="number" id="customer_age" name="age">
                        </div>
                        <div class="form-row">
                            <label for="customer_civilStatus">Civil Status:</label>
                            <select name="civil" id="customer_civilStatus">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="customer_contactNo">Contact Number:</label>
                            <input type="text" id="customer_contactNo" name="contact">
                        </div>
                        <div class="form-row">
                            <label for="customer_facebook">Facebook URL:</label>
                            <input type="url" id="customer_facebook" name="facebook">
                        </div>
                        <div class="form-control">
                            <button type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/js/customers/create.js')}}"></script>
    <script src="{{asset('/js/vehicles/sendRequest.js')}}"></script>

</body>
</html>
