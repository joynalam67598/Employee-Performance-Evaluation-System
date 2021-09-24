<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard-User-SignIn </title>
    <link href="{{asset('/')}}/admin/css/bootstrap.css" rel="stylesheet"/>
    <link href="{{asset('/')}}/admin/css/font-awesome.css" rel="stylesheet">
    <style type="text/css">
        html, body {
            height: 100%;
            margin: 0;
        }
        #wrapper {
            min-height: 100%;
            background-image: url("{{asset('/')}}/front-end/images/about_banner.jpg");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            overflow: hidden;
        }
        .sign{

            display:block;
            position:absolute;
            top: 50%;
            left: 50%;
            text-align:center;
            transform: translate(-50%,-50%);
        }
    </style>
</head>
<body>
<div id="wrapper">
    <div class="row">
        <div class="col-md-4 sign p-5">

            {{Form::open(['route'=>'user-sign-in','method'=>'post','class'=>'form-horizontal'])}}
            <div class="form-group" >
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light"><i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i></span>
                    <select class="form-control border-info" name="user_type" id="user_type" required >
                        <option value="" selected disabled>{{'-- Select user type --'}}</option>
                        <option value="{{'manager'}}">{{'Manager'}}</option>
                        <option value="{{'employee'}}">{{'Employee'}}</option>
                    </select>
                </div>
                <br>
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light"><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i></span>
                    {{Form::email('email','',['class'=>'form-control border-info','placeholder'=>'Enter Email','required'])}}
                </div>
                <br>
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light"><i class="fa fa-key fa-lg" aria-hidden="true"></i></span>
                    {{Form::password('password',['class'=>'form-control border-info','placeholder'=>'Enter Password','required'])}}
                </div>
                <br>
                {{Form::submit('Sign In',['class'=>'form-control btn btn-block btn-info'])}}
            </div>
            {{Form::close()}}
            <h4 class="text-center text-danger" id="message">{{Session::get('message')}}</h4>
        </div>
    </div>
</div>
<script src="{{asset('/')}}/admin/js/jquery-3.5.1.min.js"></script>
<script src="{{asset('/')}}/admin/js/bootstrap.js"></script>

<script>
    $(document).ready(function (){
        $('#message').click(function (){
            $(this).text('');
        });
    });
</script>

</body>

</html>



