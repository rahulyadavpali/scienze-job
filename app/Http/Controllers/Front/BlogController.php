<?php

namespace App\Http\Controllers\Front;

use URL;
use App\Seo;
use App\Job;
use App\Blog;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    public function index()
    {
        $seo = Seo::findOrFail('3');
        $metaTitle = $seo->meta_title;
        $metaDescription = $seo->meta_description;
        $keywords = $seo->meta_keyword;

        $blog = Blog::all();
        $blog = $blog->reverse();

        $job = Job::all();
        $job = $job->reverse();

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

        return view('front.pages.blog', compact('metaTitle', 'metaDescription', 'keywords', 'blog', 'job', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $job = Job::all();
        $job = $job->reverse();
        $metaTitle = $blog->meta_title;
        $metaDescription = $blog->meta_description;
        $keywords = $blog->meta_keywords;

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

        return view('front.pages.blog_detail', compact('metaTitle', 'metaDescription', 'keywords', 'blog', 'job', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

}
