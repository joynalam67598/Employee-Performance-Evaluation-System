<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{asset('/')}}admin/auth/stylesheets/css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/')}}/admin/auth/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('/')}}/admin/auth/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/')}}/admin/auth/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <p><b>ADMIN</b>LOGIN</p>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            {{Form::open(['route'=>'login','method'=>'post'])}}
            <div class="input-group mb-3">
                {{Form::email('email','',['class'=>'form-control','placeholder'=>'Enter Email','required'])}}
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                {{Form::password('password',['class'=>'form-control','placeholder'=>'Password','required','id'=>'password'])}}
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        {{Form::checkbox('remember','',false,['class'=>'form-check-input','name'=>'remember','type'=>'checkbox','id'=>'remember'])}}
                        {{--                        <input class="form-check-input" type="checkbox" name="remember" id="remember" old('remember') ? 'checked' : ''>--}}
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="col-4">
                    {{Form::submit('Sign In',['class'=>'btn btn-primary btn-block'])}}
                </div>
            </div>
            {{Form::close()}}
            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
            </div>
            <!-- /.social-auth-links -->
            @if (Route::has('password.request'))
                <p class="mb-1">
                    <a href="{{ route('password.request') }}">I forgot my password</a>
                </p>
            @endif
            <p class="mb-0">
                <a href="{{"register"}}" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('/')}}/admin/auth/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/')}}/admin/auth/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}/admin/auth/dist/js/adminlte.min.js"></script>
</body>
</html>
