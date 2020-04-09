<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $teacher = auth('Teacher')->user();
        return view('admin.dashboard.index',['name'=>$teacher->fName]);
    }
}
