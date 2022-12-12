<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Profilecontroller extends Controller
{
    public function index(){
    $param = [
        "title" => "Halaman Profile",
        "modulName" => "profile",
    ];
    
        return view ('profile' , $param);
    }
}
