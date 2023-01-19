<?php

namespace App\Http\Controllers\Front;

use Session;
use Redirect;
use App\Seo;
use App\User;
use App\Review;
use App\States;
use App\Emails;
use App\JobType;
use App\Setting;
use App\Employer;
use App\Category;
use App\Jobseeker;
use App\Categories;
use App\Subcategory;
use App\Designation;
use App\GroupCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Carbon\Carbon;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Auth;

class SignupController extends Controller
{
    public function select()
    {
        $seo = Seo::findOrFail('8');
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

        return view('front.pages.select_role', compact('metaTitle', 'metaDescription', 'keywords', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    // Employer ---
    public function employer()
    {
        $seo = Seo::findOrFail('9');
        $state = States::all();
        $jobtype = JobType::all();
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

        return view('front.pages.employer_signup', compact('metaTitle', 'metaDescription', 'keywords', 'jobtype', 'state', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function createemployer(Request $request)
    {
        $validated = $request->validate(
            [
                'institute_type' => 'required',
                'prefix' => 'required',
                'first_name' => 'required',
                'email' => 'required|email|unique:users',
                'contact_number' => 'required|min:10',
                'company_name' => 'required',
                'company_description' => 'required',
                'company_logo' => 'required',
                'company_address' => 'required',
                'zip_code' => 'required',
                'checkbox' => 'required',
            ]
        );

        $data = new Employer();
        $data->role_id = $request->role_id;
        $data->institute_type = $request->institute_type;
        $data->prefix = $request->prefix;
        $data->first_name = $request->first_name;
        $data->middle_name = $request->middle_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->contact_number = $request->contact_number;
        $data->whatsapp_number = $request->whatsapp_number;
        $data->company_name = $request->company_name;
        $data->company_website = $request->company_website;
        $data->company_description = $request->company_description;
        $data->company_address = $request->company_address;
        $data->address2 = $request->address2;
        $data->city = $request->city;
        
        $data->state = $request->state;
        $data->zip_code = $request->zip_code;
        $data->company_location = $request->company_location;
        $data->linkedin = $request->linkedin;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        if($request->file('company_logo'))
        {
            $file = $request->file('company_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\employer'), $filename);
            $data->company_logo = $filename;
        }
        $data->save();

        $job_id = 1;
        $user_id = $data->id;
        $email = $request->email;
        $name = $request->first_name.' '.$request->middle_name.' '.$request->last_name;

        return Redirect::route('creat.password')->with(['job_id'=>$job_id, 'user_id'=>$user_id, 'email'=>$email, 'name'=>$name]);
    }

    public function edit($id)
    {
        if(! Gate::allows('user_edit')){return abort(401);}
        $seo = Seo::findOrFail('10');
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

        $user = Auth::user();
        $id = $user->data_id;
        $job_id = $user->job_id;
        $user_detail = Employer::findOrFail($id);

        $category = Category::all();
        $subcategory = Subcategory::all();
        $designation = Designation::all();

        return view('front.user.editemployer', compact('metaTitle', 'metaDescription', 'keywords', 'user', 'user_detail', 'category', 'subcategory', 'designation', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function updateemployer(Request $request, $id)
    {
        if(! Gate::allows('user_create')){return abort(401);}
        $validated = $request->validate(
            [
                'first_name' => 'required',
                'company_name' => 'required',
                'company_description' => 'required',
                'company_address' => 'required',
                'zip_code' => 'required',
            ]
        );

        $data = Employer::find($id);
        $data->prefix = $request->prefix;
        $data->first_name = $request->first_name;
        $data->middle_name = $request->middle_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->contact_number = $request->contact_number;
        $data->whatsapp_number = $request->whatsapp_number;
        $data->company_name = $request->company_name;
        $data->company_website = $request->company_website;
        $data->company_description = $request->company_description;
        $data->company_address = $request->company_address;
        $data->address2 = $request->address2;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->company_location = $request->company_location;
        $data->linkedin = $request->linkedin;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->zip_code = $request->zip_code;
        if($request->file('e_company_logo'))
        {
            $file = $request->file('e_company_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\employer'), $filename);
            $data->company_logo = $filename;
        }
        $data->save();

        return redirect()->route('auth.user');
    }

    // Job-Seeker ---
    public function job_seeker()
    {
        $seo = Seo::findOrFail('9');
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

        $state = States::all();
        $category = Category::all();
        $categories = Category::all();
        $subcategory = Subcategory::all();
        $designation = Designation::all();
        $g_category = GroupCategory::all();

        return view('front.pages.jobseeker_signup', compact('metaTitle', 'metaDescription', 'keywords', 'state', 'category', 'categories', 'subcategory', 'designation', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function createseeker(Request $request)
    {
        $validated = $request->validate(
            [
                'prefix' => 'required',
                'first_name' => 'required',
                'dob' => 'required',
                'email' => 'required|email|unique:users',
                'mobile_number' => 'required|min:10',
                'photo' => 'required',
                'resume' => 'required',
                'description' => 'required',
                'presernt_work' => 'required',
                'exp_salary' => 'required',
                'address' => 'required',
                'zip_code' => 'required',
                'city' => 'required',
                'state' => 'required',
                'subcategories' => 'required|array|min:1',
                'selection_job' => 'required',
                'checkbox' => 'required',
            ]
        );
        $accept_terms = 1;

        $subcategories = $request->input('subcategories');
        $subcategories = implode($subcategories);

        $seeker = new Jobseeker();
        $seeker->role_id = $request->role_id;
        $seeker->prefix = $request->prefix;
        $seeker->first_name = $request->first_name;
        $seeker->middle_name = $request->middle_name;
        $seeker->last_name = $request->last_name;
        $seeker->dob = $request->dob;
        $seeker->email = $request->email;
        $seeker->mobile_number = $request->mobile_number;
        $seeker->other_number = $request->other_number;
        $seeker->description = $request->description;
        $seeker->presernt_work = $request->presernt_work;
        $seeker->exp_salary = $request->exp_salary;
        $seeker->address = $request->address;
        $seeker->address2 = $request->address2;
        $seeker->zip_code = $request->zip_code;
        $seeker->city = $request->city;
        $seeker->state = $request->state;
        $seeker->categories = $request->categories;

        if($request->subcategories[0]){$seeker->subcategories1 = $request->subcategories[0];}

        if(!empty($request->subcategories[1])){$seeker->subcategories2 = $request->subcategories[1];}
        else{$seeker->subcategories2 = "null";}

        if(!empty($request->subcategories[2])){$seeker->subcategories3 = $request->subcategories[2];}
        else{$seeker->subcategories3 = "null";}

        if(!empty($request->subcategories[3])){$seeker->subcategories4 = $request->subcategories[3];}
        else{$seeker->subcategories4 = "null";}

        if(!empty($request->subcategories[4])){$seeker->subcategories5 = $request->subcategories[4];}
        else{$seeker->subcategories5 = "null";}

        $seeker->linkedin = $request->linkedin;
        $seeker->facebook = $request->facebook;
        $seeker->twitter = $request->twitter;
        $seeker->selection_job = $request->selection_job;
        $seeker->accept_terms = $accept_terms;
        if($request->file('photo'))
        {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\applicant-image'), $filename);
            $seeker->photo = $filename;
        }
        if($request->file('resume'))
        {
            $file = $request->file('resume');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\applicant-cv'), $filename);
            $seeker->resume = $filename;
        }
        $seeker->save();

        $email = new Emails();
        $email->agree_id = 1;
        $email->jobseeker_id = $seeker->id;
        $email->email = $request->email;
        $email->save();

        $job_id = 2;
        $user_id = $seeker->id;
        $email = $request->email;
        $name = $request->first_name.' '.$request->middle_name.' '.$request->last_name;

        return Redirect::route('creat.password')->with(['job_id'=>$job_id, 'user_id'=>$user_id, 'email'=>$email, 'name'=>$name]);
    }

    public function createpassword()
    {
        $seo = Seo::findOrFail('9');
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

        $job_id = Session::get('job_id');
        $email = Session::get('email');
        $name = Session::get('name');
        $user_id = Session::get('user_id');

        return view('auth.employer_password', compact('metaTitle', 'metaDescription', 'keywords', 'job_id', 'email', 'name', 'user_id', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function storeuser(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                'password_confirmation' => 'required|min:8|same:password',
            ],
            [
                'password.required' => 'Password must be in 8-character',
            ]
        );

        $user = new User();
        $user->role_id = $request->role_id;
        $user->job_id = $request->job_id;
        $user->data_id = $request->employer_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $mail =  array(
            'name' => $request->name,
            'email' => $request->email,
        );
        Mail::to($request->email)->send(new WelcomeMail($mail));

        return redirect()->to(url('/register-successfully'));
    }

    public function editseeker($id)
    {
        if(! Gate::allows('user_edit')){return abort(401);}
        $seo = Seo::findOrFail('10');
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

        $user_detail = Jobseeker::findOrFail($id);

        $state = States::all();
        $category = Category::all();
        $subcategory = Subcategory::all();
        $designation = Designation::all();

        return view('front.user.editseeker', compact('metaTitle', 'metaDescription', 'keywords', 'user_detail', 'state', 'category', 'subcategory', 'designation', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function updateseeker(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'first_name' => 'required',
                'email' => 'required',
                'mobile_number' => 'required',
                'description' => 'required',
                'presernt_work' => 'required',
                'exp_salary' => 'required',
                'address' => 'required',
                'subcategories' => 'required|array|min:1',
                'zip_code' => 'required',
            ]
        );

        $seeker = Jobseeker::find($id);
        $seeker->prefix = $request->prefix;
        $seeker->first_name = $request->first_name;
        $seeker->middle_name = $request->middle_name;
        $seeker->last_name = $request->last_name;
        $seeker->dob = $request->dob;
        $seeker->email = $request->email;
        $seeker->mobile_number = $request->mobile_number;
        $seeker->other_number = $request->other_number;
        $seeker->description = $request->description;
        $seeker->presernt_work = $request->presernt_work;
        $seeker->exp_salary = $request->exp_salary;
        $seeker->address = $request->address;
        $seeker->address2 = $request->address2;
        $seeker->zip_code = $request->zip_code;
        $seeker->city = $request->city;
        $seeker->state = $request->state;
        $seeker->linkedin = $request->linkedin;
        $seeker->facebook = $request->facebook;
        $seeker->twitter = $request->twitter;
        $seeker->selection_job = $request->selection_job;
        if($request->subcategories[0]){$seeker->subcategories1 = $request->subcategories[0];}

        if(!empty($request->subcategories[1])){$seeker->subcategories2 = $request->subcategories[1];}
        else{$seeker->subcategories2 = "null";}

        if(!empty($request->subcategories[2])){$seeker->subcategories3 = $request->subcategories[2];}
        else{$seeker->subcategories3 = "null";}

        if(!empty($request->subcategories[3])){$seeker->subcategories4 = $request->subcategories[3];}
        else{$seeker->subcategories4 = "null";}

        if(!empty($request->subcategories[4])){$seeker->subcategories5 = $request->subcategories[4];}
        else{$seeker->subcategories5 = "null";}

        if($request->file('e_photo'))
        {
            $file = $request->file('e_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\applicant-image'), $filename);
            $seeker->photo = $filename;
        }
        if($request->file('e_resume'))
        {
            $file = $request->file('e_resume');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\applicant-image'), $filename);
            $seeker->resume = $filename;
        }
        $seeker->save();

        return redirect()->route('auth.user');
    }

    public function review($id)
    {
        $seo = Seo::findOrFail('10');
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

        $rev_detail = Jobseeker::findOrFail($id);

        return view('front.user.seeker_review', compact('metaTitle', 'metaDescription', 'keywords', 'rev_detail', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
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

}
