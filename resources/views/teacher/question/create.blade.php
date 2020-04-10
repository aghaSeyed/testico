@extends('layouts.main')
@section('content')
    <div class="container" style="padding-top: 35px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-horizontal" action="{{route('question.store')}}" method="Post">
                    @csrf
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <h5 class="panel-title">سوال جدید</h5>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="alert-danger" id="succsess"  style="border-radius: 20px; padding: 30px; margin-bottom: 5px;display: {{count($errors)>0 ?'block':'none'}}">
                            @foreach($errors->all() as $error)
                                <strong>{{$error}}</strong>
                                <br>
                            @endforeach
                        </div>

                        @if(isset($con))
                            <div class="alert-success" style="border-radius: 4px; text-align: center" id="success">
                                <h3 style="padding: 35px">سوال با موفقیت اضافه شد.</h3>
                            </div>
                            @endif

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">خلاصه ای از متن سوال</label>
                                        <div class="col-lg-9">
                                            <input name="slug" type="text" class="form-control" placeholder="...">
                                            <span class="help-block">جهت سهولت در جستجو از کلیدواژه استفاده کنید</span>
                                            <span class="help-block">مثال: فصل سه درس دو تفکر مارکز نظام سرمایه داری</span>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">نوع سوال:</label>
                                        <div class="col-lg-9">
                                            <select  id="myselect" data-placeholder="انتخاب کنید..." name="type"  class="form-control">
                                                <option value="1" >تشریحی</option>
                                                <option id="select1" value="0">تستی</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="test" style="display: none;">
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">گزینه یک</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="o1" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">گزینه دو</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="o2" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">گزینه سه</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="o3" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">گزینه چهار</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="o4" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">گزینه صحیح</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="answer" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">تصویر سوال:</label>
                                        <div class="col-lg-9">
                                            <input type="file" name="image" class="file-styled">
                                            <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">متن سوال</label>
                                        <div class="col-lg-9">
                                            <textarea name="contents" rows="5" cols="5" class="form-control" placeholder="سوال خود را وارد کنید..."></textarea>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-left13 position-right"></i></button>
                                    </div>
                                </div>
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
    $( "select" )
        .change(function() {
            var a = $("#myselect option:selected");
            if(a.text() == 'تستی'){
                $("#test").css("display", "block");
            }else{
                $("#test").css("display", "none");
            }
        })
        .trigger( "change" );

    $( "#success" ).fadeOut( 3000 );

</script>
@endsection

