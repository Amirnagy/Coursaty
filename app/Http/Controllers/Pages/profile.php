<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profile extends Controller
{
    public function profile()
    {
        return view('pages.profile');
    }

    public function updateProfile(){
        $user = Auth::user();
        return view('pages.updateProfile',compact('user'));
    }
}
