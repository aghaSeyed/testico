<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\CreateClassRequest;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Room;
use App\Models\Student;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
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
     * @param CreateClassRequest $request
     * @return \Illuminate\Http\RedirectResponse
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
        return redirect()->route('class.index');
//        return view('teacher.class.myclass',['rooms'=>$rooms , 'name' => $teacher->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $teacher =auth('Teacher')->user();
        $room = Room::all()->find($id);
        $students = $room->students()->get();
        $requests = \App\Models\Request::with('student')->where('status' , 0)->get();
        return view('teacher.class.index', ['name' => $teacher->id , 'students' => $students , 'requests' => $requests ,'class' => $room->id]);
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
    public function update($id)
    {


//        $teacher =auth('Teacher')->user();
//        $room = Room::all()->find($id);
//        $students = $room->students()->get();
//        $requests = \App\Models\Request::with('student')->where('status' , 0)->get();
//        return view('teacher.class.index', ['name' => $teacher->id , 'students' => $students , 'requests' => $requests]);
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

    /**
     * @param int $std_id
     * @param int $room_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToRoom($room_id , $std_id)
    {
        $request =\App\Models\Request::all()->where('student_id',$std_id)->where('room_id' , $room_id)->first();
        $request->status = 1;
        $request->save();
        $student = Student::all()->find($std_id);
        $student->rooms()->sync($room_id);
        $teacher =auth('Teacher')->user();
        $room = Room::all()->find($room_id);
        $students = $room->students()->get();
        $requests = \App\Models\Request::with('student')->where('status' , 0)->get();
        return redirect()->route('class.show',['name' => $teacher->id , 'students' => $students , 'requests' => $requests ,'class' => $room->id]);
    }

    /**
     * @param $room_id
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeFromRoom($room_id , $std_id)
    {
        $request =\App\Models\Request::all()->where('student_id',$std_id)->where('room_id' , $room_id)->first();
        if(!is_null($request))
        $request->delete();
        $student = Student::all()->find($std_id);
        $student->rooms()->detach($room_id);
        $teacher =auth('Teacher')->user();
        $room = Room::all()->find($room_id);
        $students = $room->students()->get();
        $requests = \App\Models\Request::with('student')->where('status' , 0)->get();
        return redirect()->route('class.show',['name' => $teacher->id , 'students' => $students , 'requests' => $requests ,'class' => $room->id]);

    }
    public function test()
    {
        $exam = Exam::all()->find(2);
//       $v = Verta::parse($exam->start);
//       $v2 = Verta::parse($exam->end);
//       $v1 = Verta::now();
//       dd($v1->diffMinutes($v) , $v1->diffMinutes($v2));
       $q = \GuzzleHttp\json_decode($exam->questions);
        $arr =[];
       foreach ($q as $qq){
        array_push($arr , $qq);
       }
        $questions = Question::findMany($arr)->random(1)->toArray();
       dd($questions);
    }
}
