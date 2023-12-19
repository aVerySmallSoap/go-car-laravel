<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('/css/login-style.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <h3>Login</h3>
        <div class="inner-container">
            <form id="form-login">
                <div class="form-row">
                    <label for="form-login-username">Username:</label>
                    <input type="text" id="form-login-username" name="username" placeholder="username">
                </div>
                <div class="form-row">
                    <label for="form-login-password">Password:</label>
                    <input type="password" id="form-login-password" name="password" placeholder="password">
                </div>
                <div class="form-control">
                    <button type="submit" class="btn">Login</button>
                    <button type="submit" formaction="/register" class="btn">Register</button>
                </div>
            </form>
        </div>
    </div>


<script src="{{asset('/js/authentication/login.js')}}"></script>
</body>
</html>
