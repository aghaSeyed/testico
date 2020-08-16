<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/fontFa.css')}}">
    <link href="{{url('css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{url('css/bootstrap-rtl.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <link href="{{url('css/font-awesome.css')}}" rel="stylesheet" />
    <title>Report</title>
</head>
<body>

<div class="" id="wrap">
    <div id="particles-js" style="position: fixed;">
        <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;position: absolute">
            {{$time}} &nbsp;

            <button class="btn" style="background-color: #0E2231"><a class="farsi" href="{{ route('student.dashboard') }}"
                                                                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    بازگشت
                </a></button>
            <form id="logout-form" action="{{ route('student.dashboard') }}" method="get" style="display: none;">
                {{ csrf_field() }}
            </form>

        </div>

        <div class="container-fluid" style="margin-top: 100px;">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="farsi panel" >
                        <div class="panel-heading">
                            <h1 style="color: #0d3625"><strong>نتیجه آزمون</strong></h1>
                        </div>
                        <div class="panel panel-body">
                            <h4>نام:{{$student->fName}}</h4>
                            <h4>نام خانوادگی:{{$student->lName}}</h4>
                            <h4>کد ملی:{{$student->nCode}}</h4>
                            <h1 style="color: red;">نمره آزمون:{{$score}}%</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{url('js/jquery-1.10.2.js')}}"></script>
<script src="{{url('js/particles.js')}}"></script>
<script>
    particlesJS.load('particles-js', '{{url('js/particles.json')}}', function() {
        console.log('callback - particles.js config loaded');
    });
</script>
<script src="{{url('js/bootstrap.min.js')}}"></script>

</body>
</html>
