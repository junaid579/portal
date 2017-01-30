<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loginModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    
    public function loginFunction(Request $request){
	   $user =$request->user;
	   $password = $request->passwd;
	   	   if ($user=="khan" && $password == "khan") {
            return view('welcome');    
	   	    }
	   	    else{
	   	   	echo "Login Unsucessfull !!!";
			return view('login'); 
  	   		}
    }
     
    public function store(Request $request){
        // Validate the request...
        $person = new loginModel;
        $person->username = $request->user;
        $person->password = $request->passwd;
        $person->save();
        echo "Hey inserted new row";
        return view('fetchUsers'); 
    }

     public function fetch(){
        $users = DB::table('people')->get();
        foreach ($users as $user) {
    	//$nameOfUser = $user->username;
   		//$passOfUser = $user->password;
 			$data = array(
            'nameOfUser'=>$user->username,
            'passOfUser'=>$user->password 
            );
            //echo $user->username;
            return view('display')->with($data);



		}		
    }

    
}
