<?php

namespace App\Http\Controllers\Front;

use App\Voter;
use App\Setting;
use App\Contest;
use App\UserVoter;
use App\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;
use DB;
use Hash;
use Auth;

class VoterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'contest_id' => 'required',
                'first_name' => 'required',
                'surname' => 'required',
                'email' => 'required|string|email|unique:user_voter,email',
                'password' => 'required|min:6',
                'confirmpassword' => 'required_with:password|same:password|min:6',
                'zip_code' => 'required|numeric',
                'role_id' => 'required',
            ],
            [
                'email.string' => 'email should be valid.',
                'email.email' => 'email should be in proper format.',
                'email.unique' => 'This email is alredy register.',
            ]
        );

        // Create-Voter ---
        $data = new UserVoter();
        $data->first_name = $request->first_name;
        $data->surname = $request->surname;
        $data->email = $request->email;
        $data->password = md5($request->password);
        $data->zip_code = $request->zip_code;
        $data->role_id = $request->role_id;
        $data->save();

        // Save-Voter ---
        $vote = new Voter();
        $vote->contest_id = $request->contest_id;
        $vote->registration_id = $request->registration_id;
        $vote->voter_id = $data->id;
        $vote->save();

        return response()->json(['success'=>'You are register successfully.']);
       // return redirect()->to(route('contest.show',$request->contest_id));
    }

    public function login(Request $request)
    {
        $validated = $request->validate(
            [
                'email' => 'required|email|string',
                'password' => 'required|min:6',
                'role_id' => 'required',
            ],
            [
                'email.string' => 'email should be valid',
                'email.email' => 'email should be in proper format',
            ]
        );
        $contest = $request->contest_id;
        $registration = $request->registration_id;
        $email = $request->email;
        $password = md5($request->password);
        $role = $request->role_ids;

        $vte = UserVoter::where('email',$email)->get();
        if($vte->count())
        {
            $voterid = $vte[0]['id'];

            $validation = Voter::where('voter_id',$voterid)->get();

            if($validation->count())
            {
                if($validation[0]['contest_id'] == $contest && $validation[0]['registration_id'] == $registration && $validation[0]['voter_id'] == $voterid)
                {
                    if($email == $vte[0]['email'] && $password == $vte[0]['password'])
                    {
                        $vote = new Voter();
                        $vote->contest_id = $contest;
                        $vote->registration_id = $registration;
                        $vote->voter_id = $voterid;
                        $vote->save();
                        return response()->json(['success'=>'You are Vote successfully.']);
                    }
                }
                else
                {
                    return response()->json(['errors'=>'You already vote for this contest.']);
                }
            }
            else
            {
                
                    if($email == $vte[0]['email'] && $password == $vte[0]['password'])
                    {
                        $vote = new Voter();
                        $vote->contest_id = $contest;
                        $vote->registration_id = $registration;
                        $vote->voter_id = $voterid;
                        $vote->save();
                        return response()->json(['success'=>'You are Vote successfully.']);
                    }
            }
        }
        else
        {
            return response()->json(['errors'=>'You are not registered.']);
        }
    }

}
