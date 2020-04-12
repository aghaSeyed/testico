@extends('layouts.main')
@section('scripts')
    @parent
    <script type="text/javascript" src="admin/js/pages/form_layouts.js"></script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="alert-danger "  style="border-radius: 20px; padding: 30px; margin-bottom: 5px;display: {{count($errors)>0 ?'block':'none'}}">
            @foreach($errors->all() as $error)
                <strong>{{$error}}</strong>
                <br>
            @endforeach
        </div>
    </div>
    <div class="row" style="padding-top: 20px">
        <div class="col-md-8 col-md-offset-2">
            <form action="{{route('teacher.class.store')}}" method="post">
                @csrf
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">کلاس جدید</h6>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label>نام کلاس:</label>
                        </div>
                        <input name="name" type="text" class="form-control" placeholder=" دهم ادبی یک " required>

                        <div class="form-group">
                            <label>نام درس</label>
                            <input name="field" type="text" class="form-control" placeholder="ادبیات" required>
                        </div>

                        <div class="form-group">
                            <label>توضیحات کلاس:</label>
                            <textarea name="description" rows="5" cols="5" class="form-control" placeholder="{{old('description')}}"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Your avatar:</label>
                            <input type="file" class="file-styled">
                            <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>

                        <button type="submit" class="btn bg-teal-400">ساخت<i class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </form>
        </div>



    </div>
</div>
@endsection
