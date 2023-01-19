<?php

namespace App\Http\Controllers\Front;

use Auth;
use App\Seo;
use App\User;
use App\Seller;
use App\Setting;
use App\Advertise;
use App\Advertisment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardadsController extends Controller
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
        $metaTitle = 'Advertiser Profile | Scienze Jobs : Jobs for the scientist by the scientist';
        $metaDescription = 'Advertiser profile page.';
        $keywords = '';

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
        $job_id = $user->job_id;

        if($job_id == 4)
        {
            $user_detail = Seller::findOrFail($id);

            return view('front.ads.dashboard', compact('metaTitle', 'metaDescription', 'keywords', 'job_id', 'user', 'user_detail', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
        }
        else
        {
            redirect()->to(url('/advertiser-login'));
        }
    }

}
