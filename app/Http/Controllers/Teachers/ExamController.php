<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\CreateExamRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $teacher = auth('Teacher')->user();
        $rooms = $teacher->rooms()->get();
        return  view('teacher.exam.create' , ['name' => $teacher->fName , 'rooms' =>$rooms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExamRequest $request)
    {
        $sd=$request->start_d;
        $sm=$request->start_m;
        $sy=$request->start_y;
        $start =$sy.'-'.$sm.'-'.$sd;
        dd(Jalalian::fromFormat('Y-m-d' , $start )->format('%A, %d %B %y'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
