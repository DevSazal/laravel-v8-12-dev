<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function DummyAPI(){
      return ['name'=>'Maliha Mou', 'age'=>23, 'year'=> 2020, 'address'=>'Faridpur, Dhaka'];
    }
}
