<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Forgot Passwod</title>

<link rel="shortcut icon" href="{{ asset('img/favicon.png')}}">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{ asset('/plugins/feather/feather.css')}}">

<link rel="stylesheet" href="{{ asset('plugins/icons/flags/flags.css')}}">

<link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css')}}">

<link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>

<div class="main-wrapper login-body">
<div class="login-wrapper">
<div class="container">
<div class="loginbox">
<div class="login-left">
<img class="img-fluid" src="{{ asset('img/login.png')}}" alt="Logo">
</div>
<div class="login-right">
<div class="login-right-wrap">
<h1>Welcome to KISE college</h1>

<h2>Forgot Password</h2>

@if(session('success'))
    <div class="alert alert-success" role="Login Successful">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="Wrong credentials">
        {{ session('error') }}
    </div>
@endif


<form action="{{route('forgotpasswordpost')}}" method="POST">

 @csrf
<div class="form-group">
<label>Email <span class="login-danger">*</span></label>
<input class="form-control" type="text" name="email" id="email">
<span class="profile-views"><i class="fas fa-user-circle"></i></span>
</div>
<div class="forgotpass">
</div>
<div class="form-group">
<button class="btn btn-primary btn-block" type="submit" name="submit">Forgot Password</button>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>


<script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('js/feather.min.js')}}"></script>

<script src="{{ asset('js/script.js')}}"></script>
</body>
</html>