<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class beinstractor extends Controller
{
    public function beInstractor()
    {
        $user = Auth::user();
        return view('pages.beInstracror',compact('user'));
    }

}
