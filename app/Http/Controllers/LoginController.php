<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use Hash;
class LoginController extends Controller
{
   public function login(Request $request)
   {
   		$email = $request->input('email');
		$password = $request->input('password');
		$remember = $request->input('remember');
		if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
    		return Redirect::to('/Property');
		}else{
			return Redirect::to('/');
		}
   }
   public function logout(Request $request)
   {
   		Auth::logout();
   		return Redirect::to('/');
   }
}