<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Member;
use App\Models\Brand;

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

    public function storeDataPostAPI(Request $req)
    {
      // code...
        $member = new Member;
        $member->name = $req->name;
        $member->email = $req->email;
        $member->address = $req->address;
        $member->brand_id = $req->brand_id;

        $result = $member->save();
        if($result){
          return ["result" => "Data has been saved."];
        }else{
          return ["result" => "Operation Failed!"];
        }
    }

    public function storeBrandPostAPI(Request $req)
    {
      // code...
        $brand = new Brand;
        $brand->name = $req->name;

        $result = $brand->save();
        if($result){
          return ["result" => "Data has been saved."];
        }else{
          return ["result" => "Operation Failed!"];
        }
    }

    public function updateMemberPutAPI(Request $req, $id)
    {
      // code...
        $member = Member::find($id);
        $member->name = $req->name;
        $member->email = $req->email;
        $member->address = $req->address;
        $member->brand_id = $req->brand_id;

        $result = $member->save();
        if($result){
          return ["result" => "Data has been updated."];
        }else{
          return ["result" => "Operation Failed!"];
        }
    }


}
