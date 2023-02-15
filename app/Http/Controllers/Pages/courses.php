<?php

namespace App\Http\Controllers\Pages;

use App\Models\Categorys;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courses as ModelsCourses;
use Illuminate\Support\Facades\Auth;

class courses extends Controller
{
    public function courses(){
        return view('pages.courses');
    }

    public function uploadeCourse()
    {
        $user = Auth::user();
        $category = Categorys::all();
        return view('pages.uploadecourse',compact('user','category'));
    }

    public function managecourses(){
        return view('pages.manageCourses');
    }



}
