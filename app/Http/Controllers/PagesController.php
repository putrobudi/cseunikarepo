<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getHome(){
        return view('home');
    }

    public function getHMPSSI(){
        return view('hmpssi');
    }

    public function getBEM(){
        return view('bem');
    }

    public function getSenat(){
        return view('senat');
    }

    public function getHMPTI(){
        return view('hmpti');
    }
}
