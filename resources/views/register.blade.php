<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('/css/login-style.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>


    <div class="container">
        <h3>Register</h3>
        <div class="inner-container">
            <form action="" id="form-register">
                <div class="form-row">
                    <label for="form-register-username">Username:</label>
                    <input type="text" id="form-register-username" name="username" placeholder="username">
                </div>
                <div class="form-row">
                    <label for="form-register-password">Password:</label>
                    <input type="password" id="form-register-password" name="password" placeholder="password">
                </div>
                <div class="form-row">
                    <label for="form-register-role">Role</label>
                    <select name="role" id="form-register-role">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="form-control">
                    <button type="submit" class="btn" >Register</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{asset('/js/authentication/register.js')}}"></script>
</body>
</html>
