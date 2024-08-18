<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
      return view("welcome");
  }

  public function loginSubmit(Request $request)
  {
    // Validate user input
    $credentials = $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

   
    // Attempt to authenticate user
    if (Auth::attempt($credentials)) {
        // Authentication successful, generate and return access token
        $user = Auth::user();
        $token = Str::random(80);
        $user->remember_token = hash('sha256', $token);
        $user->save();
        #$token = $user->createToken('AuthToken')->plainTextToken;
        return redirect()->route('search')->with('token',$token);
        #return response()->json(['token' => $token], 200);
    }

    // Authentication failed, return error response
    return redirect()->route('login')->with('error', 'Unauthorized');
  }

  public function logout(Request $request){
    Auth::logout();
    return redirect()->route('login');
  }

}
