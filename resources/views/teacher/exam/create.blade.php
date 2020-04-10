@extends('layouts.main')

@section('scripts')
    @parent
{{--    <script type="text/javascript" src="{{url('admin/js/plugins/pickers/pickadate/picker.date.js')}}"></script>--}}

{{--    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>--}}
{{--    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>--}}
{{--    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>--}}
{{--    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />--}}

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
                                        <textarea rows="5" cols="5" name="description" class="form-control" placeholder="توضیحات خود را اینجا وارد کنید ..."></textarea>
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
                                        <label class="display-block">زمان آزمون:</label>
                                        <input type="text" class="form-control" style="width: 60%" name="time" placeholder="45" required>
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
                                        <label>زمان شزوع آزمون </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                            <input type="text" name="start_d"  class="form-control " placeholder="روز" required>

                                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                            <input type="text" name="start_m"  class="form-control " placeholder="ماه" required>

                                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                            <input type="text" name="start_y"  class="form-control " placeholder="سال" required>

                                        </div>
                                        <span class="help-block">فیلد ها به عدد پر شوند</span>
                                        <span class="help-block">مثال قابل قبول : 02 05 1399</span>

                                    </div>

                                    <div class="form-group">
                                        <label>زمان پایان آزمون </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                            <input type="text" name="end_d"  class="form-control " placeholder="روز" required>

                                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                            <input type="text" name="end_m"  class="form-control " placeholder="ماه" required>

                                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                            <input type="text" name="end_y"  class="form-control " placeholder="سال" required>

                                        </div>
                                        <span class="help-block">فیلد ها به عدد پر شوند</span>

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

    @endsection
