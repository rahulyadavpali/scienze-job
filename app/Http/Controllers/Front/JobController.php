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
use App\Mail\ApplyMail;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
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
        $job = Jobs::orderBy('created_at', 'desc')->paginate(12);

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

        return view('front.pages.job', compact('metaTitle', 'metaDescription', 'keywords', 'empoyler', 'category', 'subcategory', 'location', 'designation', 'job_type', 'user', 'user_detail', 'job_detail', 'job', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function alljobs()
    {
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
        $job = Jobs::orderBy('created_at', 'desc')->paginate(12);

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
            $user_detail = null;
            $job_detail = null;
        }

        return view('front.pages.jobs', compact('metaTitle', 'metaDescription', 'keywords', 'empoyler', 'category', 'location', 'subcategory', 'designation', 'job_type', 'user_detail', 'job_detail', 'job', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function show($id)
    {
        $seo = Seo::findOrFail('5');
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
        $job = Jobs::findOrFail($id);
        $metaTitle = $job->job_title." | ".$seo->meta_title;
        $share = \Share::page('http://scienzejobs.com/job', 'Check the right job for you, check it out…',)->facebook()->twitter()->linkedin()->telegram()->whatsapp();

        if(Auth::user() !== null)
        {
            $user = Auth::user();

            $application = Applications::where('job_id',$job->id)->where('seeker_id',$user->data_id)->get();

            if(count($application) == 0)
            {
                $apply = 0;
            }
            else
            {
                if($application[0]->job_id == $job->id && $application[0]->seeker_id == $user->data_id)
                {
                    $apply = 1;
                }
                else
                {
                    $apply = 0;
                }
            }
        }
        else
        {
            $user = null;
            $apply = 0;
        }

        return view('front.pages.job_detail', compact('metaTitle', 'metaDescription', 'keywords', 'empoyler', 'job', 'share', 'user', 'apply', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function employer_detail($id)
    {
        $seo = Seo::findOrFail('5');
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

        $job = Employer::findOrFail($id);
        $metaTitle = $job->company_name." | ".$seo->meta_title;

        return view('front.pages.employer_detail', compact('metaTitle', 'metaDescription', 'keywords', 'job', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function create()
    {
        if(! Gate::allows('user_create')){return abort(401);}
        $id = 1;
        $form = Form::findOrFail($id);
        $metaTitle = $form->meta_title;
        $metaDescription = $form->meta_description;
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
        $data_id = $user->data_id;
        $user_detail = Employer::findOrFail($data_id);

        $state = States::all();
        $category = Category::all();
        $subcategory = Subcategory::all();
        $designation = Designation::all();
        $jobtype = JobType::all();

        return view('front.user.createjob', compact('metaTitle', 'metaDescription', 'keywords', 'user', 'user_detail', 'state', 'category', 'subcategory', 'designation', 'jobtype', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function fetchSubcategory(Request $request)
    {
        $subcategory = Subcategory::where('category_id',$request->category_id)->get(['title', 'id']);
        return response()->json($subcategory);
    }

    public function store(Request $request)
    {
        if(! Gate::allows('user_create')){return abort(401);}
        $validated = $request->validate(
            [
                'job_title' => 'required',
                'post_no' => 'required',
                'expectation' => 'required',
                'salary' => 'required',
                'location' => 'required',
                'state' => 'required',
                'categories' => 'required',
                'subcategories' => 'required',
                'selection_job' => 'required',
                'job_type' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'agree' => 'required',
            ],
        );
        $agree = 1;

        $data = new Jobs();
        $data->user_id = $request->user_id;
        $data->employer_id = $request->employer_id;
        $data->email = $request->email;
        $data->company_name = $request->company_name;
        $data->job_title = $request->job_title;
        $data->post_no = $request->post_no;
        $data->location = $request->location;
        $data->state = $request->state;
        $data->expectation = $request->expectation;
        $data->remarks = $request->remarks;
        $data->salary = $request->salary;
        $data->categories = $request->categories;
        $data->subcategories = $request->subcategories;
        $data->selection_job = $request->selection_job;
        $data->job_type = $request->job_type;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keywords = $request->meta_keywords;
        if($request->file('copy'))
        {
            $file = $request->file('copy');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload/advertisement-copy'), $filename);
            $data->copy = $filename;
        }
        if($request->file('pdf'))
        {
            $file = $request->file('pdf');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload/advertisement-pdf'), $filename);
            $data->pdf = $filename;
        }
        $data->accept_terms = $agree;
        $data->save();

        return redirect()->route('posting.job.successfully');
    }

    public function viewjob($id)
    {
        if(! Gate::allows('user_create')){return abort(401);}
        $metaTitle = "View Job Detail | User Profile";
        $metaDescription = "View Job Detail Page.";
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

        $job = Jobs::findOrFail($id);

        return view('front.user.job_detail', compact('metaTitle', 'metaDescription', 'keywords', 'job', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function editjob($id)
    {
        if(! Gate::allows('user_edit')){return abort(401);}
        $metaTitle = "Edit Job | User Profile";
        $metaDescription = "Edit Job Page.";
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

        $job = Jobs::findOrFail($id);

        $category = Category::all();
        $subcategory = Subcategory::all();
        $designation = Designation::all();
        $jobtype = JobType::all();

        return view('front.user.edit_job', compact('metaTitle', 'metaDescription', 'keywords', 'job', 'category', 'subcategory', 'designation', 'jobtype', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function updatejob(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'job_title' => 'required',
                'post_no' => 'required',
                'expectation' => 'required',
                'salary' => 'required',
            ],
        );

        $data = Jobs::find($id);
        $data->job_title = $request->job_title;
        $data->post_no = $request->post_no;
        $data->location = $request->location;
        $data->expectation = $request->expectation;
        $data->remarks = $request->remarks;
        $data->salary = $request->salary;
        $data->categories = $request->categories;
        $data->subcategories = $request->subcategories;
        $data->selection_job = $request->selection_job;
        $data->job_type = $request->job_type;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keywords = $request->meta_keywords;
        if($request->file('edit_copy'))
        {
            $file = $request->file('edit_copy');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload/advertisement-copy'), $filename);
            $data->copy = $filename;
        }
        if($request->file('edit_pdf'))
        {
            $file = $request->file('edit_pdf');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload/advertisement-pdf'), $filename);
            $data->pdf = $filename;
        }
        $data->save();

        return redirect()->route('auth.job.view', [$id]);
    }

    public function sucess()
    {
        $metaTitle = 'Job Created Successfully | The Scinece Job';
        $metaDescription = 'Job Created Successfully Page of The Scinece Job.';
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

        return view('front.pages.job_posting_success', compact('metaTitle', 'metaDescription', 'keywords', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function inactivate($id)
    {
        $data = Jobs::findOrFail($id);
        $data->delete();
        return redirect()->route('auth.user');
    }

    // Apply-Job ---
    public function apply_job($id)
    {
        if(! Gate::allows('user_access')){return abort(401);}
        $metaTitle = 'Apply Job | Job Listing | The Scinece Job';
        $metaDescription = 'Apply Job Page of The Scinece Job.';
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

        $job = Jobs::findOrFail($id);

        $user = Auth::user();
        $user_id = $user->data_id;
        $seeker = Jobseeker::findOrFail($user_id);

        return view('front.pages.apply_job', compact('metaTitle', 'metaDescription', 'keywords', 'job', 'seeker', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function send_application(Request $request)
    {
        if(! Gate::allows('user_access')){return abort(401);}
        $validated = $request->validate(['describe' => 'required',]);

        $apply = new Applications();
        $apply->job_id = $request->job_id;
        $apply->employer_id = $request->employer_id;
        $apply->seeker_id = $request->seeker_id;
        $apply->name = $request->name;
        $apply->email = $request->email;
        $apply->mobile = $request->mobile;
        $apply->job_title = $request->job_title;
        $apply->describe = $request->describe;
        $apply->save();

        $mail =  array(
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'job_title' => $request->job_title,
            'company' => $request->company_name,
        );
        Mail::to($request->email)->send(new ApplyMail($mail));

        return redirect()->route('auth.user');
    }

    // Client-Review
    public function review($id)
    {
        $metaTitle = 'Review Us - Form | The Scinece Job';
        $metaDescription = 'Review Us Form Page of The Scinece Job.';
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

        $rev_detail = Employer::findOrFail($id);

        return view('front.user.review', compact('metaTitle', 'metaDescription', 'rev_detail', 'keywords', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function store_review(Request $request)
    {
        $validated = $request->validate(['review_text' => 'required',]);

        $review = new Review();
        $review->employer_id = $request->employer_id;
        $review->image = $request->logo;
        $review->name = $request->company_name;
        $review->review_text = $request->review_text;
        $review->role_type = $request->role_type;
        $review->save();

        return redirect()->route('auth.user');
    }

    // Old-Method
    public function creat_job(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:create_job',
                'phone' => 'required',
                'organization' => 'required',
                'postal_address' => 'required',
                'expectations' => 'required',
                'salary' => 'required',
                'categories' => 'required',
                'subcategories' => 'required',
                'selection_job' => 'required',
                'agree' => 'required',
            ],
        );

        $data = new PostingJob();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->o_phone = $request->o_phone;
        $data->organization = $request->organization;
        $data->postal_address = $request->postal_address;
        $data->website = $request->website;
        $data->multi_location = $request->multi_location;
        $data->expectations = $request->expectations;
        $data->remarks = $request->remarks;
        $data->salary = $request->salary;
        $data->categories = $request->categories;
        $data->subcategories = $request->subcategories;
        $data->selection_job = $request->selection_job;
        if($request->file('copy_advertisement'))
        {
            $file = $request->file('copy_advertisement');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload/advertisement-copy'), $filename);
            $data->image = $filename;
        }
        $data->save();

        return redirect()->route('posting.job.successfully');
    }

}
