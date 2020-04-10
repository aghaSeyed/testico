<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = auth('Teacher')->user();
        return  view('teacher.question.index' , ['name' => $teacher->fName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $teacher = auth('Teacher')->user();
        return  view('teacher.question.create' , ['name' => $teacher->fName]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $request->validate([
                'contents'=>'required',
                'slug'=>'required',
                'type'=>'required',
        ]);
        $q = new Question();
        $q->content = $request->contents;
        $q->slug = $request->slug;
        $q->type = $request->type;
        if($request->type == 0){
            $q->o1 = $request->o1;
            $q->o2 = $request->o2;
            $q->o3 = $request->o3;
            $q->o4 = $request->o4;
            $q->answer = $request->answer;
        }
        $q->save();
        $con = 1;
        $teacher = auth('Teacher')->user();
        return  view('teacher.question.create' , ['name' => $teacher->fName , 'con' => $con]);
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
