<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function home(){
    	print_r(Auth::id());die;
    	$data="";
       
        if (count($data) > 0) {
            return response()->json([
	        	"success"=>true,
	        	"message"=>"Api run successfully.",
	        	"data"=>$data
	        ],200);
        }else{
        	return response()->json([
        	"success"=>false,
        	"message"=>"Record not found.",
        	"data"=>[]
        ],404);
        }
    }
}
