<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
   public function store(Request $request){
    $request->validate([
        "name"=>"required",
        "email"=>"required|email|unique:users,email",
        "password"=>"required|min:6|confirmed"
    ]);
    $body =$request->all();
    $body["password"] = bcrypt($request->password);
    $user = User::create($body);
    return  ["success"=>true,"user"=>$user];
   }
}