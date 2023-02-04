<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class about extends Controller
{
    public function about(){
        return view('pages.about');
    }


}
