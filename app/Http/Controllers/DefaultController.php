<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultController extends Controller
{
    //
    public function index(){
      return view('index',[
        "name" => "Sazal Ahamed"
      ]);
    }

    public function about(){
      return view('about',[
        "name" => "About Component Area"
      ]);
    }


    //
}
