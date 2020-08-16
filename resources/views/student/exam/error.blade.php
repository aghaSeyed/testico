<!doctype html>
<html lang="fa" dir="rtl">
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
    <title>Exam</title>
</head>
<body>

<div class="" id="wrap">
    <div id="particles-js" style="position: fixed;">
        <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;position: absolute">
            {{$time}} &nbsp;

            <button class="farsi btn" style="background-color: #0E2231;font-size: 18px;"><a href="{{ route('logout') }}"
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
                        <div class="panel panel-body text-center">
                            <h1>آزمونی برای شما وجود ندارد.</h1>
                            <br>
                            دلایل احتمالی:
                            <br>
                            آزمون هنوز شروع نشده است.
                            <br>
                            زمان آزمون به پایان رسیده است.
                            <br>
                            شما قبلا آزمون داده اید.
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

