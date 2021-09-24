<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
{{--    <link rel="icon" href="{{asset('/')}}/front-end/images/favicon.png" type="image">--}}
    <title>SignUp</title>
    <link href="{{asset('/')}}/admin/css/bootstrap.css" rel="stylesheet"/>
    <link href="{{asset('/')}}/admin/css/font-awesome.css" rel="stylesheet">
    <style type="text/css">
        html, body {
            height: 100%;
            margin: 0;
        }
        #wrapper {
            min-height: 100%;
            {{--background-image: url("{{asset('/')}}/front-end/images/about_banner.jpg");--}}
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
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-4 sign p-5" >
                {{ Form::open() }}
                <div class="form-group row">
                    {{Form::text('first_name','',['class'=>'form-control','placeholder'=>'First Name','required'])}}
                </div>
                <div class="form-group row">
                    {{Form::text('last_name','',['class'=>'form-control','placeholder'=>'Last Name','required'])}}
                </div>
                <div class="form-group row">
                    {{Form::email('email','',['class'=>'form-control','placeholder'=>'Email','required'])}}
                </div>
                <div class="form-group row">
                    {{Form::password('password',['class'=>'form-control','placeholder'=>'Password','required'])}}
                </div>
                <div class="form-group row">
                    {{Form::text('phone_number','',['class'=>'form-control','placeholder'=>'Phone Number','required'])}}
                </div>
                <div class="form-group row">
                    {{Form::textarea('address','',['class'=>'form-control','placeholder'=>'Address','rows'=>'5','required'])}}
                </div>
                <div class="form-group row">
                    {{Form::submit('Register',['class'=>'btn btn-block btn-success'])}}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <script src="{{asset('/')}}/admin/js/bootstrap.js"></script>

</body>
</html>
