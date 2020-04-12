@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row" style="padding-top: 30px">
            @foreach($exams as $exam)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="thumb">
                            <img src="{{url('admin/images/placeholder.jpg')}}" alt="">
                            <div class="caption-overflow">
										<span>
											<a href="#" class="btn bg-success-400 btn-icon"><i class="icon-pencil"></i></a>
											<a href="{{route('exam.edit',[$exam->id])}}"  class="btn bg-success-400 btn-icon"><i class="glyphicon-edit"></i></a>
										</span>
                            </div>
                        </div>

                        <div class="caption text-center">
                            <h6 class="text-semibold no-margin">{{$exam->name}}</h6>
                            <p class="text-muted mb-15 mt-5">{{$exam->description}}</p>
                            <p class="text-muted mb-15 mt-5">شروع آزمون: {{$exam->start}}</p>
                            <p class="text-muted mb-15 mt-5">پایان آزمون: {{$exam->end}}</p>

                            <a href="{{route('exam.result' , ['exam'=>$exam->id])}}" class="btn bg-teal"><i class="icon-paperplane position-left"></i>نتایج آزمون</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    @endsection
