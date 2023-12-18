<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token", content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('/css/generic-form-style.css')}}">
    <title>Edit Leaser</title>
</head>
<body>
@php($data = $data->attributesToArray())

    <div class="grid">
        <div class="design-container">
            <div class="container">
                <div class="inner-container">
                    <h2 class="title">Edit Customer</h2>
                    <form id="form-customer-edit">
                        <div class="form-row">
                            <label for="form-customer-id">ID:</label>
                            <input type="text" id="form-customer-id" name="id" value="{{$data['customer_id']}}" readonly>
                        </div>
                        <div class="form-row">
                            <label for="form-customer-agent-name">Agent:</label>
                            <select name="agent" id="form-customer-agent-name">
                                @foreach($agents->all() as $element)
                                    @foreach($element->attributesToArray() as $displayable)
                                        <option value="{{$displayable}}">{{$displayable}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="form-customer-name">Name:</label>
                            <input type="text" id="form-customer-name" name="name" value="{{$data['customer_name']}}">
                        </div>
                        <div class="form-row">
                            <label for="form-customer-age">Age:</label>
                            <input type="number" id="form-customer-age" name="age" value="{{$data['customer_age']}}">
                        </div>
                        <div class="form-row">
                            <label for="form-customer-civil">Civil Status:</label>
                            <select name="civil" id="form-customer-civil">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="form-customer-contact">Contact Number:</label>
                            <input type="number" id="form-customer-contact" name="contact" value="{{$data['customer_contactNo']}}">
                        </div>
                        <div class="form-row">
                            <label for="form-customer-facebook">Facebook:</label>
                            <input type="url" id="form-customer-facebook" name="facebook" value="{{$data['customer_facebookURL']}}">
                        </div>
                        <div class="form-control">
                            <button type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/js/customers/edit.js')}}"></script>
</body>
</html>
