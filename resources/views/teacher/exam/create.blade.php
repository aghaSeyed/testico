@extends('layouts.main')

@section('scripts')
    @parent
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap-clockpicker.min.css')}}">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css"/>
{{--    <script src="js/jquery.js"></script>--}}
    <script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
    <script src="{{url('js/bootstrap-clockpicker.min.js')}}"></script>
@endsection

@section('content')
    <div class="container" style="padding-top:30px">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="{{route('exam.store')}}" method="Post">
                    @csrf
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">آزمون جدید</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <fieldset>
                                <legend class="text-semibold">
                                    <i class="icon-file-text2 position-left"></i>
                                    اطلاعات کلی آزمون
                                    <a class="control-arrow" data-toggle="collapse" data-target="#demo1">
                                        <i class="icon-circle-down2"></i>
                                    </a>
                                </legend>

                                <div class="collapse in" id="demo1">
                                    <div class="form-group">
                                        <label>عنوان آزمون :</label>
                                        <input type="text" name="name" class="form-control" placeholder="آزمون جامع سوم">
                                    </div>

                                    <div class="form-group">
                                        <label>توضیحات آزمون</label>
                                        <textarea rows="5" cols="5" name="contents" class="form-control" placeholder="توضیحات خود را اینجا وارد کنید ..."></textarea>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend class="text-semibold">
                                    <i class="icon-reading position-left"></i>
                                    مشخصات آزمون
                                    <a class="control-arrow" data-toggle="collapse" data-target="#demo2">
                                        <i class="icon-circle-down2"></i>
                                    </a>
                                </legend>

                                <div class="collapse in" id="demo2">
                                    <div class="form-group">
                                        <label>آزمون برای کلاس :</label>
                                        <select name="class" data-placeholder="کاس..." class="form-control">
                                            @foreach($rooms as $room)
                                            <option value="{{$room->id}}">{{$room->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="display-block">مدت زمان آزمون:</label>
                                        <input type="text" class="form-control" style="width: 60%" name="time" placeholder="45" >
                                        <span class="help-block">زمان را به دقیقه وارد کنید</span>
                                    </div>

                                    <div class="form-group">
                                        <label class="display-block">نوع آزمون:</label>

                                        <label class="radio-inline">
                                            <input type="radio" name="type" class="styled" checked="checked" value="0">
                                            تستی
                                        </label>

                                        <label class="radio-inline">
                                            <input type="radio" name="type" class="styled" value="1">
                                            تستی و تشریحی
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label>تاریخ و زمان شروع آزمون</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                            <input type="text" class="form-control" id="example1" name="start" />
                                            <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                            <input type="text" class="form-control" name="sdate" id="sdate">

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label>تاریخ و زمان پایان آزمون </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                            <input type="text" class="form-control" id="example2" name="end" />
                                            <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                            <input type="text" class="form-control" name="edate" id="edate">

                                        </div>
                                        <span class="help-block">توجه شود زمان شروع و پایان یکسان نباشند.</span>

                                        <div class="form-group">
                                            <label class="display-block">تعداد سوال انتخاب شده به صورت رندوم:</label>
                                            <input type="text" class="form-control" style="width: 60%" name="number" placeholder="5" >
                                            <span class="help-block">مثال از 20 سوال انتخابی شما 5 سوال به صورت رندوم انتخاب شود.</span>
                                            <label class="display-block">تعداد سوال انتخاب شده:</label>
                                            <input id="selected" readonly value="0" class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <table id="example" class="table" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>وضعیت</th>
                                                    <th>خلاصه سوال</th>
                                                    <th>نوع سوال</th>
                                                    <th>تغییرات</th>
                                                </tr>
                                                </thead>
                                                <tbody >
                                                @foreach($questions as $question)
                                                    <tr>
                                                        <td><label id="s{{$question->id}}"></label></td>
                                                        <td>{{$question->slug}}</td>
                                                        <td>
                                                            @if($question->type == 0)
                                                                <p>تست</p>
                                                            @else
                                                                <p>تشریحی</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button type="button" onclick="f({{$question->id}})" style="width: 100px" class="btn btn-success"> add </button>
                                                            <button type="button" onclick="r({{$question->id}})" style="width: 100px" class="btn btn-danger"> remove </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>

                                            <div class="form-group">
                                            <input type="hidden" name="questions" id="qu">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" style="background-color: #1B5E20;">Submit form <i class="icon-arrow-left13 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection

@section('scripts-bottom')
    @parent

    <script>
    $('#example').DataTable();
    $("#example1").pDatepicker({
        format : "L",
    });
    $("#example2").pDatepicker({
        format : "L",
    });
    $('#sdate').clockpicker({
        donetext: 'تایید',
        autoclose: true,
        'default': 'now'
    });
    $('#edate').clockpicker({
        donetext: 'تایید',
        autoclose: true,
        'default': 'now'
    });
    var q = [];
    var selected_qu = 0;
    function f(a) {
        let flag = 0;
        for (let i = 0; i < q.length; i++) {
            if(q[i]==a){
                flag=1;
            }
        }
        if(flag ==0)
        q.push(a);
        $('#q').val(q);
        var id ="#s";
        id= id.concat(a);
        $( id).html("اتخاب شد");
        $("#qu").val(q);
        $('#selected').val(++selected_qu);
    }

    function r(item) {
        var index = q.indexOf(item);
        if (index !== -1) q.splice(index, 1);
        var id ="#s";
        id= id.concat(item);
        $( id).html(" ");
        $("#qu").val(q);
        $('#selected').val(--selected_qu);

    }

    </script>
    @endsection
