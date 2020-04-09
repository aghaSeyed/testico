<?php

<<<<<<< HEAD:app/Http/Controllers/Teachers/DashboardController.php
namespace App\Http\Controllers\Teachers;
=======
namespace App\Http\Controllers\Admin;
>>>>>>> 0f4c4ef5f70400d0b16fa44f8e734a10b39139f6:app/Http/Controllers/Student/DashboardController.php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }
}
