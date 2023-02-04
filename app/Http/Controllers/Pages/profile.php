<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profile extends Controller
{
    public function profile()
    {
        return view('pages.profile');
    }

    public function updateProfile(){
        return view('pages.updateProfile');
    }
}
