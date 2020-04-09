@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row" style="padding-top: 30px">
            @foreach($rooms as $room)
            <div class="col-md-3">
                <div class="thumbnail">
                    <div class="thumb">
                        <img src="{{url('admin/images/placeholder.jpg')}}" alt="">
                        <div class="caption-overflow">
										<span>
											<a href="#" class="btn bg-success-400 btn-icon"><i class="icon-pencil"></i></a>
											<a href="{{route('class.edit',[$room->id])}}" onclick="confirm('آیا میخواهید کلاس را حذف کنید؟');" class="btn bg-success-400 btn-icon"><i class="icon-folder-remove"></i></a>
										</span>
                        </div>
                    </div>

                    <div class="caption text-center">
                        <h6 class="text-semibold no-margin">{{$room->name}}</h6>
                        <p class="text-muted mb-15 mt-5">{{$room->description}}</p>

                        <a href="#" class="btn bg-teal"><i class="icon-paperplane position-left"></i> اعضای کلاس</a>
                    </div>
                </div>
            </div>
            @endforeach

    </div>
    </div>
    @endsection
