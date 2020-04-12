@extends('layouts.main')

@section('scripts')
    @parent
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
@endsection

@section('content')
    <div class="container" style="padding: 20px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">اعضای کلاس</h5>
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
                                اعضای فعلی
                                <a class="control-arrow" data-toggle="collapse" data-target="#demo1">
                                    <i class="icon-circle-down2"></i>
                                </a>
                            </legend>

                            <div class="collapse in" id="demo1">
                                <table id="example" class="table" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th>نام خانوادگی</th>
                                        <th>کدملی</th>
                                        <th>گزینه ها</th>
                                    </tr>
                                    </thead>
                                    <tbody >
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{$student->fName}}</td>
                                            <td>{{$student->lName}}</td>
                                            <td>{{$student->nCode}}</td>
                                            <td>
                                                <form method="get" action="{{route('teacher.class.destroy' , ['class' => $class , 'student' => $student->id ])}}">
                                                    @csrf
                                                    <button class="btn btn-dark" type="submit">remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

                            </div>
                        </fieldset>

                        <fieldset>
                            <legend class="text-semibold">
                                <i class="icon-file-text2 position-left"></i>
                                در انتظار ورود به کلاس:
                                <a class="control-arrow" data-toggle="collapse" data-target="#demo1">
                                    <i class="icon-circle-down2"></i>
                                </a>
                            </legend>

                            <div class="collapse in" id="demo1">
                                <table id="waiting" class="table" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th>نام خانوادگی</th>
                                        <th>کدملی</th>
                                        <th>گزینه ها</th>
                                    </tr>
                                    </thead>
                                    <tbody >
                                    @foreach($requests as $request)
                                        <tr>
                                            <td>{{$request->student->fName}}</td>
                                            <td>{{$request->student->lName}}</td>
                                            <td>{{$request->student->nCode}}</td>
                                            <td>
                                                <form method="get" action="{{route('teacher.class.add' , ['class' => $class , 'student' => $request->student->id ])}}">
                                                    @csrf
                                                <button class="btn" type="submit">add</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

                            </div>
                        </fieldset>

                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts-bottom')
    @parent

    <script>
        $('#example').DataTable();
        $('#waiting').DataTable();
    </script>
@endsection
