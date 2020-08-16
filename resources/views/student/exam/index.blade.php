<doctype html>
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

    <title>Exam</title>
</head>
<body>
<div class="" id="wrap">
    <div id="particles-js" style="position: fixed;">
    </div>
    <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;position: absolute">

        {{$time}} &nbsp;

    </div>

    <div id="panel" class="container">
        <form action="{{route('student.exam.execute', ['exam' => $exam_id])}}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-sm-12 ">
                    <div class="panel with-nav-tabs panel-success">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1success" data-toggle="tab">سوال 1</a></li>
                                @for($i=2 ; $i - 1 < sizeof($q) ; $i++)
                                <li><a href="#tab{{$i}}success" data-toggle="tab" class="farsi">سوال  {{$i}}</a></li>
                                    @endfor
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">

                                <div class="tab-pane fade in active" id="tab1success">
                                    <div class="farsi alert alert-success" role="alert">
                                        <h4 align='justify' style='line-height:0.75cm;'>{{strip_tags($q[0]->content)}}</h4>

                                    </div>

                                    <div class="farsi row">
                                        <div class="col-md-6 pagination-centered">
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="radio" value="1" name="Q0ans">{{$q[0]->o1}}</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="radio" value="2" name="Q0ans">{{$q[0]->o2}}</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="radio" value="3" name="Q0ans">{{$q[0]->o3}}</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="radio" value="4" name="Q0ans">{{$q[0]->o4}}</label>
                                            </div>
                                            <div style="margin: 20px;">
                                                <button type="button" class="btn btn-success"><a style="color: black" class="farsi" href="#tab2success" data-toggle="tab">بعدی</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        @for($i=1 ; $i < sizeof($indexes) ; $i++)
                                <div class="tab-pane fade in" id="tab{{$i+1}}success">
                                    <div class="farsi alert alert-success" role="alert">
                                        <h4 align='justify' style='line-height:0.75cm;'>{{strip_tags($q[$i]->content)}}</h4>

                                    </div>

                                    <div class="farsi row">
                                        <div class="col-md-6 pagination-centered">
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="radio" value="1" name="Q{{$i}}ans">{{$q[$i]->o1}}</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="radio" value="2" name="Q{{$i}}ans">{{$q[$i]->o2}}</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="radio" value="3" name="Q{{$i}}ans">{{$q[$i]->o3}}</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="radio" value="4" name="Q{{$i}}ans">{{$q[$i]->o4}}</label>
                                            </div>
                                            <div style="margin: 20px;">
                                                <button type="button" class="btn btn-success"><a style="color: black" href="#tab{{$i}}success" data-toggle="tab">قبلی</a></button>
                                                @if($indexes[$i] != 'last')
                                                <button type="button" class="btn btn-success"><a style="color: black" href="#tab{{$i+2}}success" data-toggle="tab">بعدی</a></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endfor
                                <div><span id="count" style="color: red;"></span> <p class="fa fa-clock-o"> Second Remaining</p></div>

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block" id="submit">Submit</button>

                </div>
            </div>
        </form>
    </div>
</div>


<script src="{{url('js/jquery-1.10.2.js')}}"></script>
<script src="{{url('js/particles.js')}}"></script>
<script>
    particlesJS.load('particles-js', '{{url('js/particles.json')}}', function() {
        console.log('callback - particles.js config loaded');
    });
    // $("#loading").delay(2000).fadeOut();
    setTimeout(function () {
        var element = document.getElementById("loading");
        element.parentNode.removeChild(element);
    }, 3000);

    // the selector will match all input controls of type :checkbox
    // and attach a click event handler
    $("input:checkbox").on('click', function() {
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
    });
</script>
<script>
    $(document).ready(function(){
        var count = 250;
        var interval = setInterval(function(){
            document.getElementById('count').innerHTML=count;
            count--;
            if (count === 0){
                clearInterval(interval);
                document.getElementById('count').innerHTML='Done';
                // or...
                alert("You're out of time!");
            }
        }, 1000);

        setTimeout(function() {
            $("#submit").trigger('click');
        },{{$exam_time}}* 60000);

    });
</script>
<script src="{{url('js/bootstrap.min.js')}}"></script>

</body>
</html>
</doctype>
