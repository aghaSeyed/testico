@extends('layouts.main')
@section('scripts')
    @parent
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
{{--    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />--}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script defer src="{{ mix('js/app.js') }}"></script>
@endsection

@section('content')
    <div class="container" id="app">
{{--        <div class="row" style="padding-top: 30px">--}}
{{--            <h2>کلاس های من</h2>--}}
{{--            @foreach($myRooms as $room)--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="thumbnail">--}}
{{--                        <div class="thumb">--}}
{{--                            <img src="{{url('images/Class-Room.jpg')}}" alt="">--}}
{{--                        </div>--}}

{{--                        <div class="caption text-center">--}}
{{--                            <h6 class="text-semibold no-margin">{{$room->name}}</h6>--}}
{{--                            <p class="text-muted mb-15 mt-5">{{$room->description}}</p>--}}

{{--                            <a href="{{route('studentClass.show' , $room->id)}}" class="btn bg-teal"><i class="icon-paperplane position-left"></i> ورود به کلاس</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}

{{--        </div>--}}
                    <my-classes  host="{{env("DB_HOST")}}" :rooms="{{$myRooms}}"  url-image="{{url('images/Class-Room.jpg')}}"></my-classes>

        <div class="row" style="padding-top: 30px;padding-bottom: 190px">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h5 class="panel-title">درخواست ورود به کلاس</h5>
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
                                            کلاس های فعال
                                            <a class="control-arrow" data-toggle="collapse" data-target="#demo1">
                                                <i class="icon-circle-down2"></i>
                                            </a>
                                        </legend>
                                        @if($pending)
                                        <div class="alert alert-danger">
                                            قبلا درخواست داده اید .در انتظار تایید استاد
                                        </div>
                                        @endif
                                        <div class="" id="">
                                            <table id="example" class="table">
                                                <thead>
                                                <tr>
                                                    <th>عنوان کلاس</th>
                                                    <th>درس</th>
                                                    <th>استاد</th>
                                                    <th>گزینه ها</th>
                                                </tr>
                                                </thead>
                                                <tbody >
                                                @foreach($rooms as $room)
                                                    <tr>
                                                        <td>{{$room->name}}</td>
                                                        <td>{{$room->field}}</td>
                                                        <td>{{$room->teacher()->first()->lName}}</td>
                                                        <td>
                                                            <form action="{{route('studentClass.join' , ['studentClass' => $room->id])}}" method="get">
                                                                @csrf
                                                                <button type="submit" class="btn btn-lg btn-block">Join</button>
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
        $('#example').DataTable({
            responsive: true,
        });
        $('.alert').fadeOut(6000);
    </script>
@endsection
