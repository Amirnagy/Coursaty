<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class countactUS extends Controller
{
    public function contactus(){
        return view('pages.contactus');
    }

}
