<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

    public function apiUsers(){
      // Api will call here
      // return Http::get("https://reqres.in/api/users?page=1");
      $dataList = Http::get("https://reqres.in/api/users?page=1");
      return view('apiUsers',['collection'=>$dataList['data']]);
    }


    //
}
