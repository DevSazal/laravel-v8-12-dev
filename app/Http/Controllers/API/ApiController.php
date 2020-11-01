<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator; // validator class for rules

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
      // code...  API Validation
      $validator = Validator::make($req->all(), [
	        'name' => 'required|string|min:3|max:50',
	        'email' => 'required|string|email|max:255|unique:members,email',
          'address' => 'required|string|max:80',
	        'brand_id' => 'required|integer'
	    ]);

	    //

  		if ($validator->fails()) {
          // return $validator->errors();
          return response()->json($validator->errors(), 401);
      }else {
        // code... if data valid
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

    public function deleteMemberAPI($id)
    {
      // code...
        $result = Member::destroy($id);

        if($result){
          return ["result" => "Data has been deleted."];
        }else{
          return ["result" => "Operation Failed!"];
        }
    }

    public function searchMemberAPI($key)
    {
      // code... Search API
        return Member::where('name', 'LIKE', '%'.$key.'%')->get();
    }

    public function uploadMemberFIleAPI(Request $req)
    {
      // code...  API Validation + file upload
      $validator = Validator::make($req->all(), [
          'file' => 'required|mimes:jpg,jpeg,gif,png,pdf,doc,docx,xls,xlsx,ppt,pptx',
          'member_id' => 'integer'
      ]);


      if ($validator->fails()) {
          // return $validator->errors();
          return response()->json($validator->errors(), 401);
      }else {
        // code... if data valid + model direcr call
          $model = new \App\Models\File;
          $model->file = $req->file('file')->store('apiUploader');
          $model->member_id = $req->member_id;
          $result = $model->save();
          if($result){
            return ["result" => "File has been uploaded.", "path" => "{$model->file}"];
          }else{
            return ["result" => "Operation Failed!"];
          }
      }

    }


}
