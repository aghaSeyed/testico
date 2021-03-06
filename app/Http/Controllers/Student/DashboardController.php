<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $student = auth()->user();
        return view('student.dashboard.index' , ['name' => $student->fName]);
    }
}
