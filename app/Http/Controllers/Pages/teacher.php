<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class teacher extends Controller
{
    public function instractor(){
        return view('pages.instractor');
    }

}
