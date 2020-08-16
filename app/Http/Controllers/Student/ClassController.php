<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Replies;
use App\Models\Room;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $student = auth()->user();
        $rooms =Room::where('status' , 1)->get();
        $myRooms = $student->rooms()->get();
        $pending = false;
        return  view('student.class.myclass' , ['name' => $student->fName, 'rooms' => $rooms , 'myRooms' => $myRooms , 'pending' => $pending]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $student = auth()->user();
        $exams = Room::find($id)->exams()->get();
        return view('student.class.myexam' , ['name' => $student->fName , 'exams' => $exams , 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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


    public  function join($id)
    {
        $student = auth()->user();
        $pending = false;
        $request = \App\Models\Request::where('student_id', $student->id)->where('room_id', $id)->count();
        if ($request > 0){
            $pending = true;
        }
        if (!$pending) {
            $request = new \App\Models\Request();
            $request->student_id = $student->id;
            $request->room_id = $id;
            $request->save();
        }
        $rooms =Room::where('status' , 1)->get();
        $myRooms = $student->rooms()->get();
        return  view('student.class.myclass' , ['name' => $student->fName, 'rooms' => $rooms , 'myRooms' => $myRooms , 'pending' => $pending]);
    }
}
