<?php

namespace App\Http\Controllers;

use App\Seo;
use App\Job;
use App\Faq;
use App\Jobs;
use App\Plans;
use App\Banner;
use App\Review;
use App\Offers;
use App\Setting;
use App\JobType;
use App\Websites;
use App\Scraping;
use App\Category;
use App\Employer;
use App\TopCompanies;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index()
    {
        $banner_id = 1;
        $banner = Banner::findOrFail($banner_id);

        $top_companies = TopCompanies::all();
        $job = Jobs::all();
        $job = $job->reverse();
        $job_type = JobType::all();
        $category = Category::all();
        $faq = Faq::all();
        $plan = Plans::all();
        $review = Review::all();
        $offer = Offers::all();
        $seo = Seo::findOrFail('1');
        
        $website = Websites::all();
        $scrap = Scraping::all();
        $scrap = $scrap->reverse();

        $metaTitle = $seo->meta_title;
        $metaDescription = $seo->meta_description;
        $keywords = $seo->meta_keyword;
        $author = $banner->author;

        $setting = Setting::all();
        $logo = $setting[0]->value;
        $paragraph_title = $setting[10]->title;
        $paragraph = $setting[10]->value;
        $facebook = $setting[4]->value;
        $twitter = $setting[5]->value;
        $instagram = $setting[6]->value;
        $linkedin = $setting[7]->value;

        return view('front.pages.index', compact('metaTitle', 'metaDescription', 'keywords', 'author', 'logo', 'banner', 'job', 'job_type', 'category', 'scrap', 'website', 'category', 'faq', 'plan', 'review', 'offer', 'top_companies', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

}
