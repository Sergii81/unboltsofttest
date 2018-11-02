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
        $count = 0;
    	foreach ($users as $user) {
    		if ($user->email == $userName && $user->password == $password) {
	    		$count++;
    		}
    	}
        if ($count > 0) {
                $answer=[
                   'status' => 'ok',                   
                ];
            return json_encode($answer);
            }else{
                $answer=[
                   'status' => 'error',
                ];
            return json_encode($answer);
            }

    }
    
}
