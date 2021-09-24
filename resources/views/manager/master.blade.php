<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Manager-Panel</title>
    <link href="{{asset('/')}}admin/css/styles.css" rel="stylesheet" />
    <link href="{{asset('/')}}admin/css/bootstrap.css" rel="stylesheet" />
    <link href="{{asset('/')}}admin/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}admin/css/jquery.datetimepicker.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('/')}}admin/ckeditor/ckeditor.js"></script>
    <script src="{{asset('/')}}admin/ckeditor/samples/js/sample.js"></script>
    <link rel="stylesheet" href="{{asset('/')}}admin/ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="{{asset('/')}}admin/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">





</head>
<body class="sb-nav-fixed">

    @include('manager.includes.header')

<div id="layoutSidenav">

    @include('manager.includes.menu')

    <div id="layoutSidenav_content">

    @yield('content')

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="{{asset('/')}}admin/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{asset('/')}}admin/assets/demo/chart-area-demo.js"></script>
<script src="{{asset('/')}}admin/assets/demo/chart-bar-demo.js"></script>
<script src="{{asset('/')}}admin/js/jquery.datetimepicker.full.min.js"></script>
<script src="{{asset('/')}}admin/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="{{asset('/')}}admin/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="{{asset('/')}}admin/assets/demo/datatables-demo.js"></script>
 <script src="{{asset('/')}}admin/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('/')}}admin/js/bootstrap.js"></script>


    <script>

        $(document).ready(function (){
            $('#message').click(function (){
                $(this).text('');
            });
        });
        $('#date').datetimepicker({
            format:'Y-m-d',
            maxDate: 0
        });
        $('#taskDate').datetimepicker({
            format:'Y-m-d',
            minDate: 0
        });
        $(document).ready(function (){
            $('select[name="department_id"]').on('change',function (){
                var department_id = $(this).val();

                if(department_id){

                    $.ajax({
                        url: "{{url('/get/managers/')}}/"+department_id,
                        type:'GET',
                        dataType:'json',
                        success:function (data){
                            $('#manager_id').empty();
                            $.each(data,function(kye,value){

                                $('#manager_id').append(' <option value="'+value.id+'">'+value.manager_official_id+' , '+value.first_name+' '+value.last_name+'</option>');

                            });
                        }
                    });
                }
                else
                {
                    $('#manager_id').empty();
                }
            });
        });

    </script>
<script>
    initSample();
</script>
</body>
</html>
