<?php

namespace App\Http\Controllers\Front;

use URL;
use App\Setting;
use App\Websites;
use App\Scraping;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ScrapingController extends Controller
{
    public function index()
    {
        $metaTitle = 'Other Official Jobs';
        $metaDescription = 'Other Official Jobs Page';
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

        // $scrap = Scraping::all();
        // $scrap = $scrap->reverse();

        $website = Websites::all();
        $scrap = Scraping::orderBy('created_at', 'desc')->paginate(12);

        return view('front.pages.scraping', compact('metaTitle', 'metaDescription', 'keywords', 'website', 'scrap', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function search(Request $request)
    {
        $metaTitle = 'Feed Search | Scienze JOb';
        $metaDescription = 'Feed search page.';
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

        $website = Websites::all();

        $validated = $request->validate(['keyword' => 'required']);
        $scrap = Scraping::where('title', 'LIKE', '%'.$request->keyword.'%')->get()->reverse();

        return view('front.pages.scraping_search', compact('metaTitle', 'metaDescription', 'keywords', 'website', 'scrap', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

}
