<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\CreateExamRequest;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Replies;
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
        $exams = $teacher->exams()->get();
        return  view('teacher.exam.index' , ['name' => $teacher->fName , 'exams' => $exams]);
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
        $questions = Question::all()->where('type' , 0)->all();
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

        $stime = $request->sdate.':00';
        $etime = $request->edate.':00';
        $start =$this->convertNumbers($request->start , false);
        $ss = explode('/' , $start);
        $start_time = $ss[0].'-'.$ss[1].'-'.$ss[2].' '.$stime;
        $end =$this->convertNumbers($request->end , false);
        $ee = explode('/' , $end);
        $end_time = $ee[0].'-'.$ee[1].'-'.$ee[2].' '.$etime;
        $teacher = auth('Teacher')->user();
        $exam = new Exam();
        $exam->name = $request->name;
        $exam->room_id = $request->class;
        $exam->teacher_id = $teacher->id;
        $exam->time = $request->time;
        $exam->type = $request->type;
        $questions =explode(',' , $request->questions);
        $exam->questions = json_encode($questions);
        $exam->start = $start_time;
        $exam->end = $end_time;
        $exam->save();
        return redirect()->route('exam.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
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

    /**
     * @param $exam_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function result($exam_id)
    {
        $teacher = auth('Teacher')->user();
        $matchThese = ['exam_id' => $exam_id , 'attemp' => 1 ];
        $replies = Replies::where($matchThese)->get();
        return view('teacher.exam.result' , ['name' => $teacher->fName , 'replies' => $replies]);
    }
    function convertNumbers($srting,$toPersian=true)
    {
        $en_num = array('0','1','2','3','4','5','6','7','8','9');
        $fa_num = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
        if( $toPersian ) return str_replace($en_num, $fa_num, $srting);
        else return str_replace($fa_num, $en_num, $srting);
    }
}
