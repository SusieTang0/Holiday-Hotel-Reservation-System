<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class RegisterController extends Controller
{
  public function index(){
    return view('register');
  }

  public function create(){
    return view('register');
  }

  public function register_user(Request $request){

    $validator = Validator::make($request->all(), [
      'firstname'=> 'required|string|max:20',
      'lastname'=> 'required|string|max:20',
      'email'=> 'required|email|unique:users',
      'phone'=> 'required|string',
      'password'=> 'required|min:6',
  ]);

  if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
  }else
  {
  
    $user = User::create([
        'firstname'=> $request->firstname,
        'lastname'=> $request->lastname,
        'email'=> $request->email,
        'phoneNo'=> $request->phone,
        'password'=> bcrypt($request->password),
    ]);

    return redirect(route('login'))->with('successMsg','User registered successfully');
  }
  }
}
