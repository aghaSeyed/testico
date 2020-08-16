<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Replies;
use App\Models\Room;
use Carbon\Carbon;
use ErrorException;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    /**
     * @param int $id
     * @param int $room_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id , $room_id)
    {
        $student = auth()->user();
        $exam = Exam::find($id);
        $start = Verta::parse($exam->start);
        $end = Verta::parse($exam->end);
        $now = Verta::now();
        $number = $exam->number;
        $examQuestions = \GuzzleHttp\json_decode($exam->questions);
        $arr =[];
        foreach ($examQuestions as $qq){
            array_push($arr , $qq);
        }
        $q = Question::findMany($arr)->random($number);
        $ans=array();
        foreach ($q as $question){
            array_push($ans, $question->answer);
        }
        session_start();
        $_SESSION['ans']=$ans;
        $indexes = [];
        for ($i = 0 ; $i<sizeof($ans)-1 ; $i++)
        {
            array_push($indexes , $i);
        }
        array_push($indexes , 'last');
        $exam_time = $exam->time;

            $reply = Replies::where('exam_id', $exam->id)->where('student_id', $student->id)->first();
        if(is_null($reply)){
            $reply = new Replies();
            $reply->content = 'pending';
            $reply->point = 'pending';
            $reply->attemp = 0;
            $reply->exam_id = $exam->id;
            $reply->student_id = $student->id;
            $reply->save();
        }
        if($now->diffMinutes($start) <-1 && $now->diffMinutes($end) > 1 && $reply->attemp == 0)
        {
            $reply->attemp = 1;
            $reply->save();
            $time = Verta::now();
            return view('student.exam.index' , ['time' => $time , 'q' =>$q , 'indexes' => $indexes , 'exam_time' => $exam_time , 'exam_id'=> $exam->id]);
        }
        else
        {
            $time = Verta::now();
            return view('student.exam.error' , ['time' => $time]);
        }


    }

    public function execute(Request $request , $exam_id)
    {
        $student = auth()->user();
        session_start();
        $ans=$_SESSION['ans'];
        $student_ans=$request->all();
        $correct = 0;
        for ($i=0 ; $i < sizeof($ans) ; $i++)
        {
            try {
                if ($ans[$i] == $student_ans['Q' . $i . 'ans']) {
                    $correct++;
                }
            }catch (ErrorException $e){}
        }
        $score =( $correct / sizeof($ans))*100;
        $reply = Replies::where('student_id' , $student->id)->where('exam_id' , $exam_id)->first();
        
        $reply->point = $score;
        $reply->content = json_encode($student_ans);
        $reply->save();
        $time = Verta::now();
        return view('student.exam.result' , ['time' => $time , 'student' => $student , 'score' => $score]);
    }
}
