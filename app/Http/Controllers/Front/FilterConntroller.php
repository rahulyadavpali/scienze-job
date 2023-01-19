<?php

namespace App\Http\Controllers\Front;

use URL;
use Auth;
use Image;
use App\Seo;
use App\Job;
use App\Jobs;
use App\Form;
use App\Apply;
use App\Review;
use App\States;
use App\JobType;
use App\Setting;
use App\Employer;
use App\Location;
use App\Category;
use App\UserApply;
use App\Jobseeker;
use App\PostingJob;
use App\FormFields;
use App\Subcategory;
use App\Designation;
use App\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class FilterConntroller extends Controller
{
    public function search(Request $request)
    {
        $validated = $request->validate(['keyword' => 'required']);
        $job = Jobs::where('job_title', 'LIKE', '%'.$request->keyword.'%')->get()->reverse();

        $seo = Seo::findOrFail('2');
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

        if(Auth::user() !== null )
        {
            $user = Auth::user();
            if($user->job_id == 1)
            {
                $user_detail = Employer::findOrFail($user->data_id);
                $employer_id = $user_detail->id;
                $job_detail = Jobs::where('employer_id', $employer_id)->get();
                $job_detail = $job_detail->reverse();
            }
            elseif($user->job_id == 2)
            {
                $user_detail = Jobseeker::findOrFail($user->data_id);
                $job_detail = null;
            }
            elseif($user->job_id == 3)
            {
                $user_detail = null;
                $job_detail = null;
            }
        }
        else
        {
            $user = null;
            $user_detail = null;
            $job_detail = null;
        }

        return view('front.pages.job_result', compact('metaTitle', 'metaDescription', 'keywords', 'user', 'user_detail', 'job_detail', 'job', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function jobType($id)
    {
        $job = Jobs::where('job_type', $id)->get()->reverse();

        $seo = Seo::findOrFail('2');
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

        $empoyler = Employer::all();
        $job_type = JobType::all();
        $category = Category::all();
        $location = States::all();
        $subcategory = Subcategory::all();
        $designation = Designation::all();

        if(Auth::user() !== null )
        {
            $user = Auth::user();
            if($user->job_id == 1)
            {
                $user_detail = Employer::findOrFail($user->data_id);
                $employer_id = $user_detail->id;
                $job_detail = Jobs::where('employer_id', $employer_id)->get();
                $job_detail = $job_detail->reverse();
            }
            elseif($user->job_id == 2)
            {
                $user_detail = Jobseeker::findOrFail($user->data_id);
                $job_detail = null;
            }
            elseif($user->job_id == 3)
            {
                $user_detail = null;
                $job_detail = null;
            }
        }
        else
        {
            $user = null;
            $user_detail = null;
            $job_detail = null;
        }

        return view('front.pages.job_filter', compact('metaTitle', 'metaDescription', 'keywords', 'empoyler', 'category', 'location', 'subcategory', 'designation', 'job_type', 'user', 'user_detail', 'job_detail', 'job', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function jobCategory($id)
    {
        $job = Jobs::where('categories', $id)->get()->reverse();

        $seo = Seo::findOrFail('2');
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

        $job_type = JobType::all();
        $empoyler = Employer::all();
        $category = Category::all();
        $location = States::all();
        $subcategory = Subcategory::all();
        $designation = Designation::all();

        if(Auth::user() !== null )
        {
            $user = Auth::user();
            if($user->job_id == 1)
            {
                $user_detail = Employer::findOrFail($user->data_id);
                $employer_id = $user_detail->id;
                $job_detail = Jobs::where('employer_id', $employer_id)->get();
                $job_detail = $job_detail->reverse();
            }
            elseif($user->job_id == 2)
            {
                $user_detail = Jobseeker::findOrFail($user->data_id);
                $job_detail = null;
            }
            elseif($user->job_id == 3)
            {
                $user_detail = null;
                $job_detail = null;
            }
        }
        else
        {
            $user = null;
            $user_detail = null;
            $job_detail = null;
        }

        return view('front.pages.job_filter', compact('metaTitle', 'metaDescription', 'keywords', 'empoyler', 'category', 'location', 'subcategory', 'designation', 'job_type', 'user', 'user_detail', 'job_detail', 'job', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function jobLocation($id)
    {
        $location_id = States::findOrFail($id);
        $job = Jobs::where('state', $location_id->id)->get()->reverse();

        $seo = Seo::findOrFail('2');
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

        $job_type = JobType::all();
        $empoyler = Employer::all();
        $category = Category::all();
        $location = States::all();
        $subcategory = Subcategory::all();
        $designation = Designation::all();

        if(Auth::user() !== null )
        {
            $user = Auth::user();
            if($user->job_id == 1)
            {
                $user_detail = Employer::findOrFail($user->data_id);
                $employer_id = $user_detail->id;
                $job_detail = Jobs::where('employer_id', $employer_id)->get();
                $job_detail = $job_detail->reverse();
            }
            elseif($user->job_id == 2)
            {
                $user_detail = Jobseeker::findOrFail($user->data_id);
                $job_detail = null;
            }
            elseif($user->job_id == 3)
            {
                $user_detail = null;
                $job_detail = null;
            }
        }
        else
        {
            $user = null;
            $user_detail = null;
            $job_detail = null;
        }

        return view('front.pages.job_filter', compact('metaTitle', 'metaDescription', 'keywords', 'empoyler', 'category', 'location', 'subcategory', 'designation', 'job_type', 'user', 'user_detail', 'job_detail', 'job', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function jobDesignation($id)
    {
        $job = Jobs::where('selection_job', $id)->get()->reverse();

        $seo = Seo::findOrFail('2');
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

        $job_type = JobType::all();
        $empoyler = Employer::all();
        $category = Category::all();
        $location = States::all();
        $subcategory = Subcategory::all();
        $designation = Designation::all();

        if(Auth::user() !== null )
        {
            $user = Auth::user();
            if($user->job_id == 1)
            {
                $user_detail = Employer::findOrFail($user->data_id);
                $employer_id = $user_detail->id;
                $job_detail = Jobs::where('employer_id', $employer_id)->get();
                $job_detail = $job_detail->reverse();
            }
            elseif($user->job_id == 2)
            {
                $user_detail = Jobseeker::findOrFail($user->data_id);
                $job_detail = null;
            }
            elseif($user->job_id == 3)
            {
                $user_detail = null;
                $job_detail = null;
            }
        }
        else
        {
            $user = null;
            $user_detail = null;
            $job_detail = null;
        }

        return view('front.pages.job_filter_designation', compact('metaTitle', 'metaDescription', 'keywords', 'empoyler', 'category', 'location', 'subcategory', 'designation', 'job_type', 'user', 'user_detail', 'job_detail', 'job', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

}
