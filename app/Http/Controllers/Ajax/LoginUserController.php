<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class LoginUserController extends Controller
{
    public function loginUser(Request $request)
    {
    	$users = User::all();
    	$userName = $request->userName;
    	$password = $request->password;
    	foreach ($users as $user) {
    		if ($user->email == $userName && $user->password == $password) {
	    		$answer=[
	               'status' => 'ok',
	               'name' => $user->email,
	               'rname' => $request->userName,
	               'p' => $user->password,
	            ];
           	
    		}else{
    			$answer=[
	               'status' => 'error',
	               'name' => $user->email,
	               'rname' => $request->userName,
	               'p' => $user->password,
	            ];
           	
    		}
    	}
return json_encode($answer);
    }
}
