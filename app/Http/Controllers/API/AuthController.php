<?php

namespace App\Http\Controllers\API;

use Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Club;
use App\Team;
use DB;

class AuthController extends Controller
{
     public function Register(Request $request)
     {
     	$validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['string', 'max:255',"unique:users,username"],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required'],
            'club_name' => ['required'],
        ]);

        if ($validation->fails()) {
            $error = array();
            foreach ($validation->messages()->toArray() as $key => $value) {
                $error[$key]=$value[0];
            }
            return response()->json(array(
                "success"=>false,
                "message"=>"Validation Error",
                "data"=>$error
            ),422);
        }


        $data = new User();
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->role_id = $request->role_id;
        $data->save();

        // ..........Add CLub............
        $club = new Club();
        $club->sports_id = 1;
        $club->name = $request->club_name;
        if(isset($request->image) && !empty($request->image)){
            $extension = $request->image->getClientOriginalExtension();  
            $file_name = rand(1,9999999999).".".$extension;
            $request->image->move(public_path('storage/clubs'), $file_name);
            $club->image = $file_name;
        }
        $club->log_id = $data->id;
        $club->save();
        // ..........Add CLub............

        // ..................Add Team................
        $teamAdd = new Team();
        $teamAdd->club_id = $club->id;
        $teamAdd->sports_id = 1;
        $teamAdd->name = $request->club_name;
        // $teamAdd->description = $request->description;
        $teamAdd->image = Null;
        $teamAdd->log_id = $data->id;
        $teamAdd->save();
        // ..................Add Team................

        $accessToken = $data->createToken('authToken')->accessToken;

        return response()->json(array(
            "success"=>true,
            "message"=>"User Registered Successfully.",
            "data"=>array(
                "token"=>$accessToken
            )
        ));
    }

    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'email|required|exists',
            'password' => 'required|min:8'
        ]);

        if($validation->fails())
        {
        	$error = array();
        	foreach ($validation->messages()->toArray() as $key => $value) {
        		$error[$key]=$value[0];
        	}
        	return response()->json(array(
        		"success"=>false,
        		"message"=>"Validation Error",
        		"data"=>$error
        	),422);
        }

        $loginData = array("email"=>$request->email,"password"=>$request->password);

        if(!auth()->attempt($request->email))
        {
            return response(['message' => 'Invalid Email']);
        }

        if(!auth()->attempt($request->password))
        {
            return response(['message' => 'Invalid Password']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response()->json(array(
        	"success"=>true,
        	"message"=>"Login Successfully",
        	"data"=>array(
        		"token"=>$accessToken
        	)
        ));
    }

    public function logout(Request $request) {
        try {
            $request->user()->token()->revoke();
        } catch (\Exception $e) {
            return $this->respondInternalError($e->getMessage());
        }

        return response()->json(array(
            "success"=>true,
            "message"=>"Logout Successfully",
            "data"=>array(
            )
        ));
    }
}
