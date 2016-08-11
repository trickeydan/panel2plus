<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{config('text.site_title')}}</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand navbar-link" href="{{route('dashboard')}}">{{config('text.site_title')}}</a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav navbar-right">
                <li <?php if(\Request::route()->getName() == 'dashboard') echo 'class="active"';?> role="presentation"><a href="{{route('dashboard')}}"><i class="fa fa-tachometer"></i>&nbsp;Dashboard </a></li>
                @if(\Illuminate\Support\Facades\Auth::User()->hasDNS())<li <?php if(\Request::route()->getName() == 'dns.index') echo 'class="active"';?> role="presentation"><a href="{{route('dns.index')}}"><i class="fa fa-server"></i>&nbsp;DNS</a></li>@endif
                <li role="presentation"><a href="#">Billing <span class="badge">1 </span> </a></li>
                <li role="presentation"><a href="#">Support </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>&nbsp;{{$user->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li <?php if(\Request::route()->getName() == 'settings.index') echo 'class="active"';?>><a href="{{route('settings.index')}}"><i class="fa fa-cog"></i>&nbsp;Settings</a></li>
                        <li <?php if(\Request::route()->getName() == 'settings.changepassword') echo 'class="active"';?>><a href="{{route('settings.changepassword')}}"><i class="fa fa-key"></i>&nbsp;Change My Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('auth.logout')}}"><i class="fa fa-power-off"></i>&nbsp;Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
@yield('js','')
</body>

</html>