<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\CreateExamRequest;
use App\Models\Exam;
use App\Models\Question;
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
        $teacher = auth('Teacher')->user();
        return  view('teacher.exam.index' , ['name' => $teacher->fName]);
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
        $questions = Question::all()->all();
        return  view('teacher.exam.create' , ['name' => $teacher->fName , 'rooms' =>$rooms , 'questions' => $questions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $request->validate([
//            'name' => 'required',
//            'class' => 'required',
//            'time' => 'required',
//            'type' => 'required',
//            'start_d' => 'required',
//            'start_m' => 'required',
//            'start_y' => 'required',
//            'end_d' => 'required',
//            'end_m' => 'required',
//            'questions' => 'required',
//        ]);
        $teacher = auth('Teacher')->user();
        $exam = new Exam();
        $exam->name = $request->name;
        $exam->room_id = $request->class;
        $exam->teacher_id = $teacher->id;
        $exam->time = $request->time;
        $exam->type = $request->type;
        $questions =explode(',' , $request->questions);
        $exam->questions = json_encode($questions);
        $sd=$request->start_d;
        $sm=$request->start_m;
        $sy=$request->start_y;
        $start =$sy.'-'.$sm.'-'.$sd;
        $sdate =Jalalian::fromFormat('Y-m-d' , $start )->format('%A, %d %B %y');
        $exam->start = $sdate;
        $ed=$request->end_d;
        $em=$request->end_m;
        $ey=$request->end_y;
        $end =$ey.'-'.$em.'-'.$ed;
        $edate =Jalalian::fromFormat('Y-m-d' , $start )->format('%A, %d %B %y');
        $exam->end = $edate;
        $exam->save();
        return redirect()->route('exam.index');

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
