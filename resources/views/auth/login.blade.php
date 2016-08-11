<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | {{config('text.site_title')}}</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>

<body>
<div class="login-card">
    <h1 class="text-center">{{config('text.site_title')}}</h1>
    <form class="form-signin"  method="POST" action="{{ route('auth.loginPost') }}">
        {{ csrf_field() }}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input class="form-control" type="text" required="" placeholder="Username" name="username" autofocus="">
        <input class="form-control" type="password" required="" name="password" placeholder="Password">
        <div class="checkbox">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember">Remember me</label>
            </div>
        </div>
        <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Sign in</button>
    </form><a href="#" class="forgot-password">Forgot your password?</a></div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
