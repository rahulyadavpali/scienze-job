<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Validator;
use Auth;
use URL;
use App\States;
use App\Sports;
use App\Team;
use App\Leagues;
use App\Club;
use App\Player;
use App\TeamLeagueHistory;
use App\Game;
use App\ClubLeagueHistory;
use App\TeamPlayerHistory;
use App\SportsRole;
use App\PlayerInTeamForMatch;
use App\MatchDetail;
use App\Batsman;
use App\Bowlers;
use DB;

class MasterController extends Controller
{
    public function states(){
    	$data = States::get();
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
    public function sports(){
    	$data = Sports::select('id','name','short_name')->where('id','!=',1)->get();
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

    public function Leagues(Request $request){
    	$leagues = Leagues::with('states','sports')->orderBy("id","desc");
        if(isset($request->sports_id) && !empty($request->sports_id)){
            $leagues = $leagues->where('sports_id',$request->sports_id);
        }else{
            $leagues = $leagues->where('sports_id',1);
        }
        $leagues = $leagues->get();

    	if($leagues->count()){
            $data=array();
            foreach ($leagues as $key => $value) {
                $data[$key]['id'] = $value->id;
                $data[$key]['name'] = $value->name;
                $data[$key]['description'] = $value->description;
                if(!empty($value->image) && Storage::disk('leagues')->exists($value->image)){
                    $data[$key]['image']=Storage::disk('leagues')->url($value->image);
                }else{
                    $data[$key]['image']="";
                }
            }
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

     public function clubs(){
    	$sql = Club::where([['status','1'],['log_id',Auth::id()]])->orderBy("id","desc")->get();

    	if (count($sql) > 0)  {
    		$data = array();
    		foreach($sql as $val)
    	    {
    	      $image = ""; 	
    	      if(isset($val["image"]))
    	      {
                 $image = URL::to('/')."/storage/clubs/".$val["image"];
    	      }	
              $data[] = array(
              	              "id" 		    => $val["id"],
              	              "myYaak_link" => $val["myYaak_link"],
              	              "name"	    => $val["name"],
              	              "log_id" 	    => $val["log_id"],
              	              "image"       => $image
              	           );
    	    }		
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

    public function clubdetail($id)
    {
       $sql = Club::where('club_status','1')->where('id',$id)->first();
       
       if($sql)
       {
       	   $image = ""; 	
	       if(isset($sql->image))
	       {
             $image = URL::to('/')."/storage/clubs/".$sql->image;
	       }	
       	   $data = array(
       	   				 "id"		   => $sql->id,
       	   				 "myYaak_link" => $sql->myYaak_link,
              	         "name"	       => $sql->name,
              	         "address"     => $sql->address,
              	         "description" => $sql->description,
              	         "log_id" 	   => $sql->log_id,
              	         "image"       => $image,
              	         "website"     => $sql->website_link
       					);

           return response()->json([
	        	"success"=>true,
	        	"message"=>"Api run successfully.",
	        	"data"=>$data
	        ],200);
       }
       else{
       	 	return response()->json([
	        	"success"=>false,
	        	"message"=>"Record not found.",
	        	"data"=>[]
	        ],404);
       }	
    }

    public function addClub(Request $request){

    	$validation = Validator::make($request->all(), [
	        'name' => 'required|max:255|unique:clubs,name,NULL,id',
	        'image' => 'required',
            'sports_id' => 'required',
	        'description' => 'required',
	        'address' => 'required',
	        'myYaak_link' => 'required',
	        'website_link' => 'required',
            'leagues' => 'required',
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

        $leagueExist = Leagues::where(DB::raw('LOWER(name)'),trim(strtolower($request->leagues)))->first();
        if($leagueExist){
            $league_id = $leagueExist->id;
        }else{
            $leagueInsert = new Leagues();
            $leagueInsert->name = $request->leagues;
            $leagueInsert->sports_id = $request->sports_id;
            $leagueInsert->save();

            $league_id = $leagueInsert->id;
        }


        

        $data = new Club();
        // $data->state_id = $request->state_id;
        $data->sports_id = $request->sports_id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->address = $request->address;
        $data->myYaak_link = $request->myYaak_link;
        $data->website_link = $request->website_link;
        $data->club_status = '0';

        if(isset($request->image) && !empty($request->image)){
        	 
            $extension = $request->image->getClientOriginalExtension();  
	        //$replace = substr($image_64, 0, strpos($image_64, ',')+1); 
	        
        	$file_name = rand(1,9999999999).".".$extension;
        	 
        	$request->image->move(public_path('storage/clubs'), $file_name);
        	$data->image = $file_name;
        }
 
        $data->log_id = Auth::id();
        $data->save();


        // ...............Add ClubLeagueHistory..............
        $clubLeagueHistoryAdd = new ClubLeagueHistory();
        $clubLeagueHistoryAdd->club_id = $data->id;
        $clubLeagueHistoryAdd->league_id = $league_id;
        $clubLeagueHistoryAdd->log_id = Auth::id();
        $clubLeagueHistoryAdd->save();
        // ...............Add ClubLeagueHistory..............

        // ..................Add Team................
        $teamAdd = new Team();
        $teamAdd->club_id = $data->id;
        $teamAdd->sports_id = $request->sports_id;
        $teamAdd->name = $request->name;
        $teamAdd->description = $request->description;
        $teamAdd->image = Null;
        // if(isset($request->image) && !empty($request->image)){
        //     $teamAdd->image = $file_name;
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $file_name = rand(1,9999999999).".".$extension;
        //     Storage::disk('teams')->put($file_name, file_get_contents($file));
        //     $teamAdd->image = $file_name;
        // }
        $teamAdd->log_id = Auth::id();
        $teamAdd->save();
        // ..................Add Team................

        return response()->json(array(
        	"success"=>true,
        	"message"=>"Api Run Successfully",
        	"data"=>array(
        	)
        ));
    }

    public function addPlayer(Request $request){
        $validation = Validator::make($request->all(), [
            'team_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:players,email,NULL,id',
            'jersey_no' => 'required|numeric',
            'mobile' => 'required|max:15',
            'date_of_birth' => 'required|date',
            'image' => 'required',
            'description' => 'required',

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

        $data = new Player();
        $data->team_id = $request->team_id;
        $data->sports_id = isset($request->sports_id)?$request->sports_id:1;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->jersey_no = $request->jersey_no;
        $data->mobile = $request->mobile;
        $data->date_of_birth = $request->date_of_birth;
        $data->description = $request->description;
        $data->types_of_batsman = isset($request->types_of_batsman)?$request->types_of_batsman:null;
        $data->types_of_bowler = isset($request->types_of_bowler)?$request->types_of_bowler:null;


        // if(isset($request->image) && !empty($request->image)){
        //     $image_64 = $request->image; //your base64 encoded data
        //     $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
        //     $replace = substr($image_64, 0, strpos($image_64, ',')+1); 
        //     $image = str_replace($replace, '', $image_64);
        //     $image = str_replace(' ', '+', $image);

        //     $file_name = rand(1,9999999999).".".$extension;
        //     Storage::disk('players')->put($file_name, base64_decode($image));

        //     $data->image = $file_name;
        // }

        if($request->file('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = rand(1,9999999999).".".$extension;
            // $path = public_path().'/storage/clubs';
            Storage::disk('players')->put($file_name, file_get_contents($file));

            $data->image = $file_name;
        }

        $data->log_id = Auth::id();
        $data->save();

        if($request->team_id){
            $playerInsert = new TeamPlayerHistory();
            $playerInsert->team_id = $request->team_id;
            $playerInsert->player_id = $data->id;
            $playerInsert->log_id = Auth::id();
            $playerInsert->save();
        }

        return response()->json(array(
            "success"=>true,
            "message"=>"Api Run Successfully",
            "data"=>array(
            )
        ));
    }

    public function addLeague(Request $request){
        $validation = Validator::make($request->all(), [
            // 'state_id' => 'required',
            'sports_id' => 'required',
            // 'teams' => 'array',
            'name' => 'required|max:255',
            'image' => 'required',
            'description' => 'required'

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

        $data = new Leagues();
        // $data->state_id = $request->state_id;
        $data->sports_id = $request->sports_id;
        $data->name = $request->name;
        $data->description = $request->description;

        if($request->file('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = rand(1,9999999999).".".$extension;
            // $path = public_path().'/storage/leagues';
            Storage::disk('leagues')->put($file_name, file_get_contents($file));

             $data->image = $file_name;
        }

        $data->log_id = Auth::id();
        $data->save();

        if(isset($request->teams) && $request->teams!=null & count($request->teams)>0){
            foreach ($request->teams as $key => $value) {
                $teamHistory = new TeamLeagueHistory();
                $teamHistory->league_id = $data->id;
                $teamHistory->team_id = $value;
                $teamHistory->save();
            }
        }
        return response()->json(array(
            "success"=>true,
            "message"=>"Api Run Successfully",
            "data"=>array(
            )
        ));
    }
    public function getTeamsBySports(Request $request){
        $validation = Validator::make($request->all(), [
            'id' => 'required',
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

        $teams = Team::where('sports_id',$request->id)->pluck('name','id');
        return response()->json(array('success'=>true,"message"=>"Api run successfully",'data'=>$teams));
    }
    public function getLeaguesBySports(Request $request){
        $validation = Validator::make($request->all(), [
            'id' => 'required',
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

        $data = Leagues::select('name','id')->where('sports_id',$request->id)->get();
        return response()->json(array('success'=>true,"message"=>"Api run successfully",'data'=>$data));
    }

    public function addTeam(Request $request){
        $validation = Validator::make($request->all(), [
            'club_id' => 'required',
            'sports_id' => 'required',
            // 'league_id' => 'required|array',
            'name' => 'required|max:255',
            // 'name' => 'required|max:255|unique:leagues,name,NULL,id,sports_id,' . $request->sport_id.',state_id,' . $request->state_id,
            'image' => 'required',
            'description' => 'required'
        ],
        [
            // 'league_id.required'=>"Leagues is required"
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
        $playersArray = isset($request->players)?$request->players:[];

        $data = new Team();
        $data->club_id = $request->club_id;
        $data->sports_id = $request->sports_id;
        $data->name = $request->name;
        $data->description = $request->description;

        if($request->file('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = rand(1,9999999999).".".$extension;
            Storage::disk('teams')->put($file_name, file_get_contents($file));

             $data->image = $file_name;
        }

        $data->log_id = Auth::id();
        $data->save();

        if(count($playersArray)){
            foreach ($playersArray as $key => $value) {
                $playerInsert = new TeamPlayerHistory();
                $playerInsert->team_id = $data->id;
                $playerInsert->player_id = $value;
                $playerInsert->log_id = Auth::id();
                $playerInsert->save();
            }
        }

        if(isset($request->league_id) && $request->league_id!=null){
            foreach ($request->league_id as $value) {
                $teamLeagueHistory = new TeamLeagueHistory();
                $teamLeagueHistory->league_id = $value;
                $teamLeagueHistory->team_id = $data->id;
                $teamLeagueHistory->save();
            }
        }
        return response()->json(array(
            "success"=>true,
            "message"=>"Api Run Successfully",
            "data"=>array(
            )
        ));
    }

    public function getTeamLeagueHistory(Request $request){
        $validation = Validator::make($request->all(), [
            'id' => 'required',
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

        $teams = TeamLeagueHistory::select('teams.name','teams.id')
            ->join('teams','teams.id','team_league_histories.team_id')
            ->where('team_league_histories.league_id',$request->id)->pluck('name','id')->toArray();
        return response()->json(array('success'=>true,"message"=>"Api run successfully",'data'=>$teams));
    }

    public function addMatch(Request $request){
        $validation = Validator::make($request->all(), [
            // 'teams' => 'required|array|min:2|max:2',
            // 'team_a' => 'required',
            // 'team_b' => 'required',
            'match_date' => 'required',
            'league_id' => 'required',
            'vanue' => 'required|max:255',
            'toss_winner' => 'required',
            'electorate' => 'required',
            'total_overs' => 'required',
        ],
        [
            'teams.required'=>"Teams is required"
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

        $game = new Game();
        $game->match_key = rand(1,9999999999);
        $game->team_a = $request->team_a;
        $game->team_b = $request->team_b;
        $game->match_date = $request->match_date;
        $game->league_id = $request->league_id;
        $game->vanue = $request->vanue;
        $game->toss_winner = $request->toss_winner;
        $game->electorate = $request->electorate;
        $game->total_overs = $request->total_overs;
        $game->log_id = Auth::id();
        $game->save();

        return response()->json(array('success'=>true,"message"=>"Api run successfully",'data'=>['id'=>$game->id]));
    }
    public function dashboard(){
        $teams = Team::where('log_id',Auth::id())->get()->count();
        $clubs = Club::where('log_id',Auth::id())->get()->count();
        $players = 0;
        return response()->json(array('success'=>true,"message"=>"Api run successfully",'data'=>["teams"=>$teams,"clubs"=>$clubs,"players"=>$players]));
    }
    public function players(Request $request){

        $players = Player::select('id','team_id','name','image','jersey_no','email','mobile','date_of_birth','description','status')->where("log_id",Auth::id())->orderBy('created_at','desc');
        if(isset($request->sports_id) && !empty($request->sports_id)){
            $players = $players->where('sports_id',$request->sports_id);
        }else{
            $players = $players->where('sports_id',1);
        }

        $players = $players->get();
        
        if($players->count()){
            $data=array();
            foreach ($players as $key => $value) {
                $data[$key]['id'] = $value->id;
                $data[$key]['team_id'] = $value->team_id;
                $data[$key]['name'] = $value->name;
                $data[$key]['jersey_no'] = $value->jersey_no;
                $data[$key]['email'] = $value->email;
                $data[$key]['mobile'] = $value->mobile;
                $data[$key]['date_of_birth'] = $value->date_of_birth;
                $data[$key]['description'] = $value->description;
                $data[$key]['status'] = $value->status;
                if(!empty($value->image) && Storage::disk('players')->exists($value->image)){
                    $data[$key]['image']=Storage::disk('players')->url($value->image);
                }else{
                    $data[$key]['image']="";
                }
            }
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

    public function teams(Request $request){
        $data = Team::select('id','name','image','description')->where('log_id',Auth::id());
        if(isset($request->sports_id) && !empty($request->sports_id)){
            $data = $data->where('sports_id',$request->sports_id);
        }else{
            $data = $data->where('sports_id',1);
        }
        $data = $data->get();


        if ($data->count())  {
            $array = array();
            foreach($data as $key=>$value)
            {
                $array[$key]['id'] = $value->id;
                $array[$key]['name'] = $value->name;
                $array[$key]['description'] = $value->description;
                if(!empty($value->image) && Storage::disk('teams')->exists($value->image)){
                    $array[$key]['image']=Storage::disk('teams')->url($value->image);
                }else{
                    $array[$key]['image']="";
                }
            }       
            return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$array
            ],200);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"Record not found.",
                "data"=>[]
            ],404);
        }
    }

    public function searchLeagues(Request $request){

        $data = Leagues::orderBy("id","desc");
        if(isset($request->search) && !empty($request->search)){
            $data = $data->where(DB::raw('LOWER(name)'),'like','%'.trim(strtolower($request->search)).'%');
        }
        $data = $data->pluck('name','id');

        if (count($data) > 0) {
            $array = array();
            $i=0;
            foreach ($data as $key => $value) {
                // $array[$i]['year'] = $key;
                $array[$i]['title'] = $value;
                $i++;
            }
            return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$array
            ],200);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"Record not found.",
                "data"=>[]
            ],404);
        }
    }

    public function getClubs(){
        $data = Club::where('log_id',Auth::id())->pluck('name','id');
        if (count($data) > 0) {
            $array = array();
            $i=0;
            foreach ($data as $key => $value) {
                $array[$i]['year'] = $key;
                $array[$i]['label'] = $value;
                $i++;
            }
            return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$array
            ],200);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"Record not found.",
                "data"=>[]
            ],404);
        }
    }
    public function getTeams(Request $request){
        $data = Team::where('log_id',Auth::id());
        if(isset($request->sports_id) && !empty($request->sports_id)){
            $data = $data->where('sports_id',$request->sports_id);
        }else{
            $data = $data->where('sports_id',1);
        }
        $data = $data->pluck('name','id');

        if (count($data) > 0) {
            $array = array();
            $i=0;
            foreach ($data as $key => $value) {
                $array[$i]['year'] = $key;
                $array[$i]['label'] = $value;
                $i++;
            }
            return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$array
            ],200);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"Record not found.",
                "data"=>[]
            ],404);
        }
    }

    public function getLeagues(){
        $data1 = Leagues::select('id','name')->get();
        $data = Leagues::where('sports_id',1)->pluck('name','id');
        if ($data->count()) {
            $array = array();
            $i=0;
            foreach ($data as $key => $value) {
                $array[$i]['year'] = $key;
                $array[$i]['label'] = $value;
                $i++;
            }
            return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$array
            ],200);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"Record not found.",
                "data"=>[]
            ],404);
        }
    }

    public function getPlayers(Request $request){
        $data = Player::select('name','id')->where('log_id',Auth::id());
        if(isset($request->sports_id) && !empty($request->sports_id)){
            $data = $data->where('sports_id',$request->sports_id);
        }else{
            $data = $data->where('sports_id',1);
        }
        $data = $data->get();
        // $data = Player::where('log_id',Auth::id())->pluck('name','id');
        if ($data->count()) {
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

    public function getPendingMatches(){
        $data = Game::with('team_a_data','team_b_data')->orderBy('match_date','desc')->where([['progress_status',0]])->get();

        if ($data->count()) {
            $array = array();
            foreach ($data as $key => $value) {
                $array[$key]['id'] = $value->id;
                $array[$key]['match_steps'] = $value->match_steps;
                $array[$key]['match_date'] = date("d-M-Y",strtotime($value->match_date));
                $array[$key]['vanue'] = $value->vanue;
                $array[$key]['team_a_data']['name'] = $value->team_a_data->name;
                if(\Storage::disk('teams')->exists($value->team_a_data->image)){
                    $array[$key]['team_a_data']['image'] = Storage::disk('teams')->url($value->team_a_data->image);
                }else{
                    $array[$key]['team_a_data']['image']="";
                }
                $array[$key]['team_a_data']['description'] = $value->team_a_data->description;

                $array[$key]['team_b_data']['name'] = $value->team_b_data->name;
                if(\Storage::disk('teams')->exists($value->team_b_data->image)){
                    $array[$key]['team_b_data']['image'] = Storage::disk('teams')->url($value->team_b_data->image);
                }else{
                    $array[$key]['team_b_data']['image']="";
                }
                $array[$key]['team_b_data']['description'] = $value->team_b_data->description;

                $array[$key]['league_name'] = $value->league_data->name;
            }
            return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$array
            ],200);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"Record not found.",
                "data"=>[]
            ],404);
        }
    }

    public function getSportsRoles(Request $request){
        $validation = Validator::make($request->all(), [
            'id' => 'required',
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

        $data = SportsRole::where('sports_id',$request->id)->pluck('name','id');
        if ($data->count()) {
            $array = array();
            $i=0;
            foreach ($data as $key => $value) {
                $array[$i]['year'] = $key;
                $array[$i]['label'] = $value;
                $i++;
            }
            return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$array
            ],200);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"Record not found.",
                "data"=>[]
            ],404);
        }
    }

    public function getTeamsByLeagues(Request $request){
        $validation = Validator::make($request->all(), [
            'id' => 'required',
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
        $data = TeamLeagueHistory::with(['teams'])->where('league_id',$request->id)->get();

        if ($data->count()) {
            $array = array();
            $i=0;
            foreach ($data as $key => $value) {
                $array[$i]['year'] = $value->team_id;
                $array[$i]['label'] = $value->teams->name;
                $i++;
            }
            return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$array
            ],200);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"Record not found.",
                "data"=>[]
            ],404);
        }
    }
    public function assignLeagues(Request $request){
        $validation = Validator::make($request->all(), [
            'leagues' => 'required|array',
            'team_id' => 'required',
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

        if(count($request->leagues)>0){
            $exist = TeamLeagueHistory::where('team_id',$request->team_id);
            if($exist->get()->count()){
                $exist->delete();
            }
            foreach ($request->leagues as $key => $value) {
                $teamHistory = new TeamLeagueHistory();
                $teamHistory->league_id = $value;
                $teamHistory->team_id = $request->team_id;
                $teamHistory->save();
            }
        }

        return response()->json([
            "success"=>true,
            "message"=>"Api run successfully.",
            "data"=>[]
        ],200);
    }

    public function getSelectedAssignLeagues(Request $request){
        $validation = Validator::make($request->all(), [
            'id' => 'required',
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
        $data = TeamLeagueHistory::with(['leagues'])->where('team_id',$request->id)->get();

        if ($data->count()) {
            $array = array();
            $i=0;
            foreach ($data as $key => $value) {
                $array[$i]['name'] = $value->leagues->name;
                $array[$i]['id'] = $value->league_id;
                $i++;
            }
            return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$array
            ],200);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"Record not found.",
                "data"=>[]
            ],404);
        }
    }
    public function getPlayersByMatch(Request $request){
        $validation = Validator::make($request->all(), [
            'id' => 'required',
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
        $team_id = $request->id;
        $match = Game::find($team_id);
        $array = array();

        $team_a_players = $match->team_a_players;
        $array['team_a']['name'] = $match->team_a_data->name; 
        if(count($team_a_players)){
            foreach ($team_a_players as $keyA => $valueA) {
                $array['team_a']['players'][$keyA]['id'] = $valueA->player_id;     
                $array['team_a']['players'][$keyA]['name'] = Player::find($valueA->player_id)->name;     
            }
        }

        $team_b_players = $match->team_b_players;
        $array['team_b']['name'] = $match->team_b_data->name; 
        if(count($team_b_players)){
            foreach ($team_b_players as $keyB => $valueB) {
                $array['team_b']['players'][$keyB]['id'] = $valueB->player_id;     
                $array['team_b']['players'][$keyB]['name'] = Player::find($valueB->player_id)->name;     
            }
        }        
        // $array['team_a']['players'] = $match->team_a_players->toArray(); 
        return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$array
            ],200);
    }

    public function addPlayersInTeamForMatch(Request $request){
        $validation = Validator::make($request->all(), [
            'match_id' => 'required',
            'player_id_a' => 'required|array',
            'player_id_b' => 'required|array',
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

       
        $matchKey = Game::find($request->match_id)->match_key;
        
        
        $data = new PlayerInTeamForMatch();
        $data->match_id = $request->match_id;
        $data->match_key = $matchKey;
        $data->team_a = json_encode($request->player_id_a);
        $data->team_b = json_encode($request->player_id_b);
        $data->log_id = Auth::id();
        $data->save();

        $gameUpdate = Game::find($request->match_id);
        $gameUpdate->match_steps = 1;
        $gameUpdate->save();


        $game = Game::find($request->match_id);
        if($game->electorate==1 && $game->toss_winner==$game->team_a){
            $bats_array = $game->playerINTeamForMatch->team_a;
        }elseif($game->electorate==1 && $game->toss_winner==$game->team_b){
            $bats_array = $game->playerINTeamForMatch->team_b;
        }elseif($game->electorate==2 && $game->toss_winner==$game->team_b){
            $bats_array = $game->playerINTeamForMatch->team_a;
        }elseif($game->electorate==2 && $game->toss_winner==$game->team_a){
            $bats_array = $game->playerINTeamForMatch->team_b;
        }

        $bat_data = new Batsman();
        $bat_data->match_id = $request->match_id;
        $bat_data->player_id = json_decode($bats_array)[0];
        $bat_data->strike = 2;
        $bat_data->run_cordinate=json_encode(array());
        $bat_data->log_id = Auth::id();
        $bat_data->save();

        $bat_op_data = new Batsman();
        $bat_op_data->match_id = $request->match_id;
        $bat_op_data->player_id = json_decode($bats_array)[1];
        $bat_op_data->strike = 1;
        $bat_op_data->run_cordinate=json_encode(array());
        $bat_op_data->log_id = Auth::id();
        $bat_op_data->save();



        return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>['id'=>$request->match_id]
            ],200);
    }

    public function getSelectedTeamPlayerHistory(Request $request){
        $validation = Validator::make($request->all(), [
            'id' => 'required',
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

        $data = PlayerInTeamForMatch::where('match_id',$request->id)->first();
        $match = Game::find($request->id);
        if ($data) {
            $array = array();
            $array['team_a']['name'] = $match->team_a_data->name; 
            foreach (json_decode($data->team_a) as $keyA => $valueA) {
                $array['team_a']['players'][$keyA]['id'] = $valueA;     
                $array['team_a']['players'][$keyA]['name'] = Player::find($valueA)->name;     
            }

            $array['team_b']['name'] = $match->team_b_data->name; 
            foreach (json_decode($data->team_b) as $keyA => $valueB) {
                $array['team_b']['players'][$keyA]['id'] = $valueB;     
                $array['team_b']['players'][$keyA]['name'] = Player::find($valueB)->name;     
            }

            return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$array
            ],200);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"Record not found.",
                "data"=>[]
            ],404);
        }
    }

    public function assignCaptainAndWicketKeeper(Request $request){
        $validation = Validator::make($request->all(), [
            'match_id' => 'required',
            'team_a_captain_id' => 'required',
            'team_a_wicket_keeper_id' => 'required',
            'team_b_captain_id' => 'required',
            'team_b_wicket_keeper_id' => 'required',
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

        $id = PlayerInTeamForMatch::where('match_id',$request->match_id)->first()->id;
        
        $upd = PlayerInTeamForMatch::find($id);
        $upd->team_a_captain_id = $request->team_a_captain_id;
        $upd->team_a_wicket_keeper_id = $request->team_a_wicket_keeper_id;
        $upd->team_b_captain_id = $request->team_b_captain_id;
        $upd->team_b_wicket_keeper_id = $request->team_b_wicket_keeper_id;
        $upd->save();

        $gameUpdate = Game::find($request->match_id);
        $gameUpdate->match_steps = 2;
        $gameUpdate->save();

        return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>['id'=>$request->match_id]
            ],200);

    }
    public function getMatchBoard(Request $request){
        $validation = Validator::make($request->all(), [
            'id' => 'required',
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
        $match = Game::find($request->id);

        if ($match) {
            $array = array();
            if($match->team_a_data->log_id == Auth::id()){
                $array['electorate'] = $match->electorate;
            }else{
                if($match->electorate==1){
                    $array['electorate'] = 2;
                }else{
                    $array['electorate'] = 1;
                }
            }

            $array['id'] = $match->id;
            $array['match_key'] = $match->match_key;
            $array['match_date'] = $match->match_date;
            $array['vanue'] = $match->vanue;
            $array['toss_winner'] = $match->toss_winner;
            $array['progress_status'] = $match->progress_status;
            $array['match_steps'] = $match->match_steps;
            $array['total_overs'] = $match->total_overs;

            $array['team_a']['name'] = $match->team_a_data->name; 
            if(Storage::disk('teams')->exists($match->team_a_data->image)){
                $array['team_a']['image'] = Storage::disk('teams')->url($match->team_a_data->image); 
            }else{
                $array['team_a']['image'] = ""; 
            }

            $array['team_b']['name'] = $match->team_b_data->name; 
            if(Storage::disk('teams')->exists($match->team_b_data->image)){
                $array['team_b']['image'] = Storage::disk('teams')->url($match->team_b_data->image); 
            }else{
                $array['team_b']['image'] = ""; 
            }

            $array['current_batsman'] = array();
            if($match->strikeBatsPlayers->count()){
                foreach ($match->strikeBatsPlayers as $key => $value) {
                    $array['current_batsman'][$key]['id'] = $value->playerData->id;
                    $array['current_batsman'][$key]['name'] = $value->playerData->name;
                    $array['current_batsman'][$key]['total_balls'] = $value->total_balls>5 ? number_format($value->total_balls/6,1) : number_format($value->total_balls,1);
                    $array['current_batsman'][$key]['runs'] = $value->runs ? $value->runs: 0;
                    $array['current_batsman'][$key]['strike'] = $value->strike;

                    if(!empty($value->playerData->image) && Storage::disk('players')->exists($value->playerData->image)){
                        $array['current_batsman'][$key]['image']=Storage::disk('players')->url($value->playerData->image);
                    }else{
                        $array['current_batsman'][$key]['image']="";
                    }
                }
            }
            $array['current_bowler'] = array();
            if($match->currentBowlerPlayer){
                $array['current_bowler']['player_id'] = $match->currentBowlerPlayer->player->id;
                $array['current_bowler']['player_name'] = $match->currentBowlerPlayer->player->name;

                if(!empty($match->currentBowlerPlayer->player->image) && Storage::disk('players')->exists($match->currentBowlerPlayer->player->image)){
                    $array['current_bowler']['player_image']=Storage::disk('players')->url($match->currentBowlerPlayer->player->image);
                }else{
                    $array['current_bowler']['player_image']="";
                }
            }

            return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$array
            ],200);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"Record not found.",
                "data"=>[]
            ],404);
        }
    }

    public function manageMatch(Request $request){
        $validation = Validator::make($request->all(), [
            'match_id' => 'required',
            'player_id' => 'required',
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

        /*.........................Commentry..........................*/

        $batsman_player_name = Player::find($request->player_id)->name;
        $message = $batsman_player_name.' is hits '.$request->runs.' runs.';


        $get_commentry = PlayerInTeamForMatch::where('match_id',$request->match_id)->first();
        $upd_commentry = PlayerInTeamForMatch::find($get_commentry->id);

        $comm_array = json_decode($get_commentry->commentry);
        $total_count = count($comm_array)-1;

        $get_last_array = end($comm_array);

        $set_last_array = array(
            'ball'=>$get_last_array->ball,
            'over'=>$get_last_array->over,
            'current_over'=>$get_last_array->current_over,
            'message'=>$get_last_array->message.$message,
        );
        unset($comm_array[$total_count]);


        $upd_commentry->commentry = json_encode(array_merge($comm_array,[$set_last_array]));
        $upd_commentry->save();

        /*.........................Commentry..........................*/

        $exist  = Batsman::where([['match_id',$request->match_id],['player_id',$request->player_id]])->first();

        $op_exist  = Batsman::where([['match_id',$request->match_id],['player_id',$request->strike_player_id]])->first();

        

        $strike = 1;
        $op_strike = 2;
        if($request->runs==2 || $request->runs==4 || $request->runs==6){
            $strike = 2;
            $op_strike = 1;
        }

        /*...............Over Change...............*/
        $get_match = Game::find($request->match_id);
        if($get_match->current_ball==5){
            $current_over = $get_match->current_over + 1;
            $current_ball = 0;

            $updateBowlers = Bowlers::where([['match_id',$request->match_id],['over_status','1']])->update(['over_status'=>'2']);
        }else{
            $current_over = $get_match->current_over ? $get_match->current_over : 0;
            $current_ball = $get_match->current_ball+$request->total_balls;
        }
        $get_match->current_over = $current_over;
        $get_match->current_ball = $current_ball;
        $get_match->save();
        /*...............Over Change...............*/

        $get_match_data = Game::find($request->match_id);

        if($get_match_data->current_ball==0){
            $strike = 1;
            $op_strike = 2;
        }


        if($exist){
            $run_cordinate = array_merge(json_decode($exist->run_cordinate),array(["cordiate_x"=>$request->run_x,"cordiate_y"=>$request->run_y,"runs"=>$request->runs]));

            $data = Batsman::find($exist->id);
            $data->runs = $exist->runs + $request->runs;
            $data->six = $exist->six + $request->six;
            $data->four = $exist->four + $request->four;
            $data->dots = $exist->dots + $request->dots;

            $data->no_ball = $exist->dots + $request->no_ball;
            $data->wide_ball = $exist->dots + $request->wide_ball;
            $data->bye = $exist->dots + $request->bye;

            $data->total_balls = $exist->total_balls + $request->total_balls;

            $data->dismissal = $request->dismissal;
            $data->dismissal_type = $request->dismissal_type;
            $data->dismissal_bowler = $request->dismissal_bowler;
            $data->dismissal_fielder = $request->dismissal_fielder;

            $data->run_cordinate = json_encode($run_cordinate);

            $data->strike = $strike;
            $data->strike_rate = 0;
            $data->innings = 1;

            $data->log_id = Auth::id();
            $data->save();

            if($op_exist){
                $op_data = Batsman::find($op_exist->id);
                $op_data->strike = $op_strike;
                $op_data->save();
            }else{
                $op_data = new Batsman();
                $op_data->match_id = $request->match_id;
                $op_data->player_id = $request->strike_player_id;
                $op_data->strike = $op_strike;
                $op_data->run_cordinate=json_encode(array());
                $op_data->log_id = Auth::id();
                $op_data->save();
            }


        }else{
            $data = new Batsman();
            $data->match_id = $request->match_id;
            $data->player_id = $request->player_id;
            $data->runs = $request->runs;
            $data->six = $request->six;
            $data->four = $request->four;
            $data->dots = $request->dots;
            $data->no_ball = $request->no_ball;
            $data->wide_ball = $request->wide_ball;
            $data->bye = $request->bye;
            $data->total_balls = $request->total_balls;

            $data->dismissal = $request->dismissal;
            $data->dismissal_type = $request->dismissal_type;
            $data->dismissal_bowler = $request->dismissal_bowler;
            $data->dismissal_fielder = $request->dismissal_fielder;

            $data->run_cordinate = json_encode(array(["cordiate_x"=>$request->run_x,"cordiate_y"=>$request->run_y,"runs"=>$request->runs]));

            $data->strike = $strike;
            $data->strike_rate = 0;
            $data->innings = 1;

            $data->log_id = Auth::id();
            $data->save();

            $op_data = new Batsman();
            $op_data->match_id = $request->match_id;
            $op_data->player_id = $request->strike_player_id;
            $op_data->strike = $op_strike;
            $op_data->run_cordinate=json_encode(array());
            $op_data->log_id = Auth::id();
            $op_data->save();
        }

        return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>[]
            ],200);
    }

    public function manageBalls(Request $request){
        $validation = Validator::make($request->all(), [
            'match_id' => 'required',
            'player_id' => 'required',
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



        $get_match = Game::find($request->match_id);

        /*.........................Commentry..........................*/
        $getCurrentStrikeBatsman = Batsman::where([['dismissal','0'],['retired','0'],['strike','2'],['match_id',$request->match_id]])->first();
        $batsman_player_name = $getCurrentStrikeBatsman->playerData->name;
        $bowler_player_name = Player::find($request->player_id)->name;

        $current_over = $get_match->current_over;
        $current_ball = $get_match->current_ball + 1;

        if($request->pitch_y>0 && $request->pitch_y<=4){
            $ball_type = "short ball";
        }elseif($request->pitch_y>4 && $request->pitch_y<=7){
            $ball_type = "good ball";
        }elseif($request->pitch_y>7 && $request->pitch_y<=8.5){
            $ball_type = "full ball";
        }elseif($request->pitch_y>8.5){
            $ball_type = "yorker ball";
        }

        $commentry_array = array(
            "over"=>$current_over,
            "ball"=>$current_ball,
            "current_over"=>$current_over.'.'.$current_ball,
            "message"=>$bowler_player_name.' '.$ball_type.' to '.$batsman_player_name.', '
        );
        // print_r($commentry_array);die;

        $get_commentry = PlayerInTeamForMatch::where('match_id',$request->match_id)->first();
        $upd_commentry = PlayerInTeamForMatch::find($get_commentry->id);
        if(empty($get_commentry->commentry)){
            $upd_commentry->commentry = json_encode([$commentry_array]);
        }else{
            $comm_array = json_decode($get_commentry->commentry);

            $upd_commentry->commentry = json_encode(array_merge($comm_array,[$commentry_array]));
        }
        $upd_commentry->save();
        /*.........................Commentry..........................*/

        $exist  = Bowlers::where([['match_id',$request->match_id],['player_id',$request->player_id]])->first();

        if($exist){
            if($exist->total_wickets){
                if(!empty($request->wicket_id)){
                    $total_wickets = array_merge(json_decode($exist->total_wickets),array($request->wicket_id));
                }else{

                    $total_wickets = $exist->total_wickets;
                }

            }

            $run_cordinate = array_merge(json_decode($exist->pitch_cordinate),array(["pitch_x"=>$request->pitch_x,"pitch_y"=>$request->pitch_y,"runs"=>$request->runs,"over"=>$get_match->current_over,"ball"=>$get_match->current_ball]));


            $data = Bowlers::find($exist->id);
            $data->runs = $exist->runs + $request->runs;
            $data->no_ball = $exist->no_ball + $request->no_ball;
            $data->wide_ball = $exist->wide_ball + $request->wide_ball;
            $data->six = $exist->six + $request->six;
            $data->four = $exist->four + $request->four;
            $data->dots = $exist->dots + $request->dots;
            $data->bye = $exist->bye + $request->bye;
            $data->total_balls = $exist->total_balls + $request->total_balls;
            $data->wickets = $exist->wickets + $request->wickets;
            $data->total_wickets = $total_wickets;
            $data->retired = $request->retired;
            $data->retired_type = $request->retired_type;
            $data->pitch_cordinate = json_encode($run_cordinate);
            $data->innings = 1;
            $data->log_id = Auth::id();
            $data->save();

        }else{
            $data = new Bowlers();
            $data->match_id = $request->match_id;
            $data->player_id = $request->player_id;
            $data->runs = $request->runs;
            $data->no_ball = $request->no_ball;
            $data->wide_ball = $request->wide_ball;
            $data->six = $request->six;
            $data->four = $request->four;
            $data->dots = $request->dots;
            $data->bye = $request->bye;
            $data->total_balls = $request->total_balls;
            $data->wickets = $request->wickets;
            $data->total_wickets = $request->wicket_id?json_encode(array($request->wicket_id)):json_encode([]);
            $data->retired = $request->retired;
            $data->retired_type = $request->retired_type;
            $data->pitch_cordinate = json_encode(array(["pitch_x"=>$request->pitch_x,"pitch_y"=>$request->pitch_y,"runs"=>$request->runs,"over"=>$get_match->current_over,"ball"=>$get_match->current_ball]));
            $data->innings = 1;
            $data->log_id = Auth::id();
            $data->save();
        }

        return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>[]
            ],200);   
    }


    public function selectBowlersForMatch(Request $request){
        $validation = Validator::make($request->all(), [
            'match_id' => 'required',
            'player_id' => 'required',
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

        $bats_exist = Batsman::where("match_id",$request->match_id)->first();

        $game = Game::find($request->match_id);

        if(!$bats_exist){
            if($game->electorate==1 && $game->toss_winner==$game->team_a){
                $bats_array = $game->playerINTeamForMatch->team_a;
            }elseif($game->electorate==1 && $game->toss_winner==$game->team_b){
                $bats_array = $game->playerINTeamForMatch->team_b;
            }elseif($game->electorate==2 && $game->toss_winner==$game->team_b){
                $bats_array = $game->playerINTeamForMatch->team_a;
            }elseif($game->electorate==2 && $game->toss_winner==$game->team_a){
                $bats_array = $game->playerINTeamForMatch->team_b;
            }

            $bat_data = new Batsman();
            $bat_data->match_id = $request->match_id;
            $bat_data->player_id = json_decode($bats_array)[0];
            $bat_data->strike = 2;
            $bat_data->run_cordinate=json_encode(array());
            $bat_data->log_id = Auth::id();
            $bat_data->save();

            $bat_op_data = new Batsman();
            $bat_op_data->match_id = $request->match_id;
            $bat_op_data->player_id = json_decode($bats_array)[1];
            $bat_op_data->strike = 1;
            $bat_op_data->run_cordinate=json_encode(array());
            $bat_op_data->log_id = Auth::id();
            $bat_op_data->save();
        }

        $ballbats_exist = Bowlers::where("match_id",$request->match_id)->first();
        if(!$ballbats_exist){
            $data = new Bowlers();
            $data->match_id = $request->match_id;
            $data->player_id = $request->player_id;
            $data->total_wickets = json_encode([]);
            $data->pitch_cordinate = json_encode([]);
            $data->over_status = 1;
            $data->innings = 1;
            $data->log_id = Auth::id();
            $data->save();
        }else{
            $balls_exist = Bowlers::where([["match_id",$request->match_id],['player_id',$request->player_id]])->first();
            if($balls_exist){
                $updateBowlers = Bowlers::where([['match_id',$request->match_id],['player_id',$request->player_id]])->update(['over_status'=>'1']);
            }else{
               $data = new Bowlers();
                $data->match_id = $request->match_id;
                $data->player_id = $request->player_id;
                $data->total_wickets = json_encode([]);
                $data->pitch_cordinate = json_encode([]);
                $data->over_status = 1;
                $data->innings = 1;
                $data->log_id = Auth::id();
                $data->save(); 
            }
        }
        $players = Player::find($request->player_id);
        $array = array(
                "player_id"=>$players->id,
                "player_name"=>$players->name
            );
        return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$array
            ],200); 
    }
    public function getBowlers($id){
        $game = Game::find($id);
        if($game->electorate==1 && $game->toss_winner==$game->team_a){
            $balls_array = $game->playerINTeamForMatch->team_b;
        }elseif($game->electorate==1 && $game->toss_winner==$game->team_b){
            $balls_array = $game->playerINTeamForMatch->team_a;
        }elseif($game->electorate==2 && $game->toss_winner==$game->team_b){
            $balls_array = $game->playerINTeamForMatch->team_b;
        }elseif($game->electorate==2 && $game->toss_winner==$game->team_a){
            $balls_array = $game->playerINTeamForMatch->team_a;
        }
        $players = Player::select('id','name')->whereIn('id',json_decode($balls_array))->get();
        return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$players
            ],200);
    }
    public function getCurrentBowler($id){
        $data = Bowlers::with('player')->where([['match_id',$id],['over_status','1'],['retired','0']])->first();
        if($data){
            $array = array(
                "player_id"=>$data->player->id,
                "player_name"=>$data->player->name
            );
            return response()->json([
                "success"=>true,
                "message"=>"Api run successfully.",
                "data"=>$array
            ],200);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"Record not found.",
                "data"=>[]
            ],404);
        }
    }

    public function matchData($id){
        $game = Game::find($id);
        // if($game->electorate==1 && $game->toss_winner==$game->team_a){
        //     $bats_array = $game->playerINTeamForMatch->team_a;
        // }elseif($game->electorate==1 && $game->toss_winner==$game->team_b){
        //     $bats_array = $game->playerINTeamForMatch->team_b;
        // }elseif($game->electorate==2 && $game->toss_winner==$game->team_b){
        //     $bats_array = $game->playerINTeamForMatch->team_a;
        // }elseif($game->electorate==2 && $game->toss_winner==$game->team_a){
        //     $bats_array = $game->playerINTeamForMatch->team_b;
        // }

        // if($game->electorate==1 && $game->toss_winner==$game->team_a){
        //     $balls_array = $game->playerINTeamForMatch->team_b;
        // }elseif($game->electorate==1 && $game->toss_winner==$game->team_b){
        //     $balls_array = $game->playerINTeamForMatch->team_a;
        // }elseif($game->electorate==2 && $game->toss_winner==$game->team_b){
        //     $balls_array = $game->playerINTeamForMatch->team_b;
        // }elseif($game->electorate==2 && $game->toss_winner==$game->team_a){
        //     $balls_array = $game->playerINTeamForMatch->team_a;
        // }
        $array = array();
        $array['current_batsman']  = array();
        $array['current_bowler']  = array();
        if($game->strikeBatsPlayers->count()){
            foreach ($game->strikeBatsPlayers as $key => $value) {
                $array['strike_batsman'][$key]['id'] = "id";
                $array['strike_batsman'][$key]['name'] = "name";
            }
        }
        print_r($array);
        print_r($game->strikeBatsPlayers->toArray());
        die;
    }

}
