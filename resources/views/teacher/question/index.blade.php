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
                        <h5 class="panel-title">لیست سوالات</h5>
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

                                <a class="control-arrow" data-toggle="collapse" data-target="#demo1">
                                    <i class="icon-circle-down2"></i>
                                </a>
                            </legend>

                            <div class="collapse in" id="demo1">
                                <table id="example" class="table" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>خلاصه سوال</th>
                                        <th>تصویر</th>
                                        <th>نوع سوال</th>
                                        <th>گزینه ها</th>
                                        <th> </th>
                                    </tr>
                                    </thead>
                                    <tbody >
                                    @foreach($questions as $question)
                                        <tr>
                                            <td>{{$question->slug}}</td>
                                            <td>{{$question->image}}</td>
                                            <td>
                                                @if($question->type == 0)
                                                    <p>تست</p>
                                                    @else
                                                    <p>تشریحی</p>
                                                @endif
                                            </td>
                                            <td>
                                                <form method="get" action="{{route('question.edit' , ['question' =>$question->id])}}">
                                                    @csrf
                                                    <button class="btn btn-dark" type="submit">edit</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form method="post" action="{{route('question.destroy' , ['question' =>$question->id])}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-dark" type="submit">remove</button>
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
    </script>
@endsection
