<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function show(){
        return view('home.index');    
        //$teste = Auth::user();
        //echo Auth::usuario()->username;
        //die();
    }
}
