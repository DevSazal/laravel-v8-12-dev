<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// add model
use App\Models\Member;
use App\Models\Brand;
class MemberController extends Controller
{
    //
    public function index(){
      return Member::find(1)->getBrandData;
    }
}
