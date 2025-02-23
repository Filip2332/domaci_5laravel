<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $trenutniSat = date("h");
        $trenutnoVreme = date("h:i:s");
        return view('welcome',compact('trenutnoVreme','trenutniSat'));
    }
}
