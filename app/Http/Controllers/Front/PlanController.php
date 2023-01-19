<?php

namespace App\Http\Controllers\Front;

use App\Seo;
use App\Plans;
use App\Setting;
use App\Information;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    public function index()
    {
        $seo = Seo::findOrFail('7');
        $metaTitle = $seo->meta_title;
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

        $plan = Plans::all();
        $information = Information::findOrFail('10');

        return view('front.pages.plans', compact('metaTitle', 'metaDescription', 'keywords', 'information', 'plan', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

}
