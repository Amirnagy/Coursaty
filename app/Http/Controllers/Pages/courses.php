<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class courses extends Controller
{
    public function courses(){
        return view('pages.courses');
    }

}
