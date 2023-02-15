<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;

class CV extends Controller
{

    // public function makeCV()
    // {
    //     $user = Auth::user();
    //     $userInfoInstractor = Auth::user()->InfoInstractor;
    //     return view('pages.cv',compact("userInfoInstractor","user"));

    // }

    public function downloadCV()
    {

        $dompdf = new Dompdf();
        $user = Auth::user();
        $userInfoInstractor = Auth::user()->InfoInstractor;
        $dompdf->loadHtml(view('pages.cv',compact("userInfoInstractor","user")));

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream();
    }
}
