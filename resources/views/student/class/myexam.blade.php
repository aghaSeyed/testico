@extends('layouts.main')

@section('content')
    <div class="container" style="padding: 20px;">
        <div class="row">
            @foreach($exams as $exam)
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title">{{$exam->name}}</h6>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div>
                            <h4>{{$exam->description}}</h4>
                            <br>
                            <p>شروع آزمون : {{$exam->start}} </p>
                            <form action="{{route('student.exam.show',['exam' => $exam->id , 'room' => $id])}}" method="">
                                <button type="submit" class="btn btn-success">ورود به آزمون</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>
    @endsection
