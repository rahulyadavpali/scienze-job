<?php

namespace App\Http\Controllers\Front;

use Auth;
use App\Seo;
use App\Jobs;
use App\Review;
use App\Emails;
use App\Setting;
use App\Employer;
use App\Jobseeker;
use App\Applications;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seo = Seo::findOrFail('12');
        $metaDescription = $seo->meta_description;
        $keywords = $seo->meta_keyword;

        $setting = Setting::all();
        $logo = $setting[0]->value;
        $email = $setting[1]->value;
        $phone = $setting[2]->value;
        $address = $setting[3]->value;
        $map = $setting[9]->value;
        $paragraph_title = $setting[10]->title;
        $paragraph = $setting[10]->value;
        $facebook = $setting[4]->value;
        $twitter = $setting[5]->value;
        $instagram = $setting[6]->value;
        $linkedin = $setting[7]->value;

        $review = Review::all();

        $user = Auth::user();
        $id = $user->data_id;
        $job_id = $user->job_id;
        if($job_id == 1)
        {
            $user_detail = Employer::findOrFail($id);
            $employer_id = $user_detail->id;
            $job_detail = Jobs::where('employer_id', $employer_id)->get();
            $job_detail = $job_detail->reverse();
            $jobs = Jobs::all();
            $metaTitle = $user_detail->company_name." | ".$seo->meta_title;
        }
        elseif($job_id == 2)
        {
            $user_detail = Jobseeker::findOrFail($id);
            $jobseeker_id = $user_detail->id;
            $dob = Carbon::createFromFormat('Y-d-m', $user_detail->dob)->format('m-d-Y');
            $job_detail = Applications::where('seeker_id', $id)->get();
            $job_detail = $job_detail->reverse();
            $jobs = Jobs::all();
            $metaTitle = $user_detail->first_name." | ".$seo->meta_title;
        }
        else
        {
            redirect()->to(url('/user-login'));
        }

        return view('front.user.dashboard', compact('metaTitle', 'metaDescription', 'keywords', 'job_id', 'dob', 'user', 'review', 'user_detail', 'job_detail', 'jobs', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function jobs()
    {
        $metaTitle = "Your Jobs | Scienze Jobs : Jobs for the scientist by the scientist";
        $metaDescription = "Employer jobs page.";
        $keywords = "";

        $setting = Setting::all();
        $logo = $setting[0]->value;
        $email = $setting[1]->value;
        $phone = $setting[2]->value;
        $address = $setting[3]->value;
        $map = $setting[9]->value;
        $paragraph_title = $setting[10]->title;
        $paragraph = $setting[10]->value;
        $facebook = $setting[4]->value;
        $twitter = $setting[5]->value;
        $instagram = $setting[6]->value;
        $linkedin = $setting[7]->value;

        $user = Auth::user();
        $id = $user->data_id;
        $user_detail = Employer::findOrFail($id);
        $employer_id = $user_detail->id;
        $job = Jobs::where('employer_id', $employer_id)->get();
        $job = $job->reverse();

        return view('front.user.your_jobs', compact('metaTitle', 'metaDescription', 'keywords', 'job', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function application()
    {
        $metaTitle = "Your Applications | Scienze Jobs : Jobs for the scientist by the scientist";
        $metaDescription = "Employer applications page.";
        $keywords = "";

        $setting = Setting::all();
        $logo = $setting[0]->value;
        $email = $setting[1]->value;
        $phone = $setting[2]->value;
        $address = $setting[3]->value;
        $map = $setting[9]->value;
        $paragraph_title = $setting[10]->title;
        $paragraph = $setting[10]->value;
        $facebook = $setting[4]->value;
        $twitter = $setting[5]->value;
        $instagram = $setting[6]->value;
        $linkedin = $setting[7]->value;

        $user = Auth::user();
        $id = $user->data_id;
        $application = Applications::where('seeker_id', $id)->get();
        $application = $application->reverse();
        $job = Jobs::all();

        return view('front.user.your_application', compact('metaTitle', 'metaDescription', 'keywords', 'application', 'job', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

}
