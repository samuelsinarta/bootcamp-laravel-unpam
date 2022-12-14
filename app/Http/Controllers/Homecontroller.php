<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function index(){
        $param = [
            "title" => "Dashboard",
            "modulename" => "dashboard"
        ];
        return view ('welcome', $param);
    }
}