<?php

namespace App\Http\Controllers\Pages;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class teacher extends Controller
{
    public function instractor(){
        $user = Auth::user();
        return view('pages.instractor',compact('user'));
    }


    public function viewAllinstarctor()
    {

        // $users = User::pluck('name')->all();
        $user = Auth::user();
        $Instractorinfo = User::select('name','profile_photo_path','roles')->where('roles', '=' , 1 )->get();

        // foreach($Instractorinfo as $info)
        // {
        //     echo $info->name . "</br>";
        // }
        // dd($Instractorinfo);
        return view('pages.instractor',compact('Instractorinfo','user'));

    }

}
