<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\CreateClassRequest;
use App\Models\Room;
use App\Models\Student;
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
        $teacher = auth('Teacher')->user();
        $rooms = $teacher->rooms()->where('status' , 1)->get();
        return  view('teacher.class.myclass' , ['name' => $teacher->fName, 'rooms' => $rooms]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $teacher = auth('Teacher')->user();
        return  view('teacher.class.create' , ['name' => $teacher->fName]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(CreateClassRequest $request)
    {
        $teacher =auth('Teacher')->user();
        $room = new Room();
        $room->name = $request->name;
        $room->teacher_id = $teacher->id;
        $room->status = 1;
        $room->field = $request->field;
        $room->description = $request->description;
        $room->save();
        $rooms = $teacher->rooms()->where('status' , 1)->get();
        return view('teacher.class.myclass',['rooms'=>$rooms , 'name' => $teacher->id]);

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $teacher = auth('Teacher')->user();
        $room =$teacher->rooms()->where('id' , $id)->first();
        $room->status = 0;
        $room->save();
        return redirect()->route('class.index');
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

    }
}
