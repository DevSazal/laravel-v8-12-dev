<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Member;

class ApiController extends Controller
{
    //
    public function DummyAPI(){
      return ['name'=>'Maliha Mou', 'age'=>23, 'year'=> 2020, 'address'=>'Faridpur, Dhaka'];
    }

    public function getMemberAPI($id = NULL)
    {
      // code...
      return $id ? Member::find($id) : Member::all();
    }
}
