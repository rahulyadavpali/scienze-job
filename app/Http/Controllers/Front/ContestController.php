<?php

namespace App\Http\Controllers\Front;

use App\Contest;
use App\Gallery;
use App\Sponser;
use App\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use DB;

class ContestController extends Controller
{
    public function index()
    {
        $contest = Contest::all();
        $contest = $contest->reverse();
        $metaTitle = 'Prize Pool | Home';
        $metaDescription = 'Home page of Prize Pool.';

        return view('front.pages.index', compact('contest', 'metaTitle', 'metaDescription'));
    }

    public function openContest()
    {
        $contest = Contest::all();
        $contest = $contest->reverse();
        $metaTitle = 'Open Contest | Prize Pool';
        $metaDescription = 'Open Contest page of Prize Pool.';

        $shareComponent = \Share::page(
            'https://makitweb.com/how-to-upload-multiple-files-with-vue-js-and-php/',
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()
        ->reddit();

        return view('front.pages.openContest', compact('contest', 'metaTitle', 'metaDescription', 'shareComponent'));
    }

    public function upcomingContest()
    {
        $contest = Contest::all();
        $contest = $contest->reverse();
        $metaTitle = 'Upcoming Contest | Prize Pool';
        $metaDescription = 'Upcoming Contest page of Prize Pool.';

        return view('front.pages.upcomingContest', compact('contest', 'metaTitle', 'metaDescription'));
    }

    public function completedContest()
    {
        $contest = Contest::all();
        $contest = $contest->reverse();
        $metaTitle = 'Completed Contest | Prize Pool';
        $metaDescription = 'Completed Contest page of Prize Pool.';

        return view('front.pages.completedContest', compact('contest', 'metaTitle', 'metaDescription'));
    }

    public function show($id)
    {
        $contest = Contest::findOrFail($id);
        $metaTitle = $contest->meta_title;
        $metaDescription = $contest->meta_description;

        // Contestant data and Vote count ---
        $vote = Registration::where('contest_id',$id)->get();

        // Current Entires ---
        $numbers = str_split($contest->registration->count());
        $newnumber = array();
        if(count($numbers) < 4)
        {
            $findlength = 4 - count($numbers);
            for($i = 0; $i < $findlength; $i++)
            {
                $newnumber[] = 0;
            }
        }
        foreach($numbers as $value)
        {
            $newnumber[] = $value;
        }

        $prizeSql = DB::table('contest')->select("final_prize_first","final_prize_second","final_prize_third")->where('id',$id)->first(); 
        
        $prizemoney = array();
        if(!empty($prizeSql))
        {
            $prizemoney = array("0" => $prizeSql->final_prize_first, "1" => $prizeSql->final_prize_second, "2" => $prizeSql->final_prize_third);
        }

        return view('front.pages.viewcontest', compact('contest','newnumber','vote','prizemoney', 'metaTitle', 'metaDescription'));
    }

}
