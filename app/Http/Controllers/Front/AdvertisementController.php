<?php

namespace App\Http\Controllers\Front;

use Auth;
use Session;
use Redirect;
use App\Seo;
use App\User;
use App\Seller;
use App\Setting;
use App\Advertise;
use App\Advertisment;
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

class AdvertisementController extends Controller
{
    // Login-Page ---
    public function login()
    {
        $metaTitle = 'Login | Scienze Jobs : Jobs for the scientist by the scientist';
        $metaDescription = 'Login Advertiser Page.';
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

        return view('auth.ad_login', compact('metaTitle', 'metaDescription', 'keywords', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    // Registration-advertiser ---
    public function index()
    {
        $metaTitle = 'Advertisement Registration | Scienze Jobs : Jobs for the scientist by the scientist';
        $metaDescription = 'Advertisement Registration Page.';
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

        return view('front.ads.index', compact('metaTitle', 'metaDescription', 'keywords', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'first_name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                'confirm_password' => 'required|min:8|same:password',
                'checkbox' => 'required',
            ]
        );

        $user = new Seller();
        $user->role_id = 4;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = bcrypt($request->password);
        $user->accept_terms = 1;
        $user->save();

        $data = new User();
        $data->role_id = $request->role_id;
        $data->job_id = $request->job_id;
        $data->data_id = $user->id;
        $data->name = $request->first_name;
        $data->email = $request->email;
        $data->username = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect()->to(url('/register-successfully'));
    }

    public function edit($id)
    {
        if(! Gate::allows('user_edit')){return abort(401);}
        $metaTitle = 'Edit Advertiser Profile | Scienze Jobs : Jobs for the scientist by the scientist';
        $metaDescription = 'Edit advertiser profile page.';
        $keywords = '';
        $user_detail = Seller::findOrFail($id);

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

        return view('front.ads.editadvertiser', compact('metaTitle', 'metaDescription', 'keywords', 'user_detail', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function updateadvertiser(Request $request)
    {
        $validated = $request->validate(['first_name' => 'required','email' => 'required|email|string',]);

        $user = Seller::find($request->id);
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->save();

        return redirect()->to(url('/advertiser-user'));
    }

    // Edit-Password ---
    public function editpassword($id)
    {
        if(! Gate::allows('user_edit')){return abort(401);}
        $metaTitle = 'Edit Advertiser Password | Scienze Jobs : Jobs for the scientist by the scientist';
        $metaDescription = 'Edit advertiser password page.';
        $keywords = '';
        $user_detail = Seller::findOrFail($id);

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

        return view('front.ads.editpassword', compact('metaTitle', 'metaDescription', 'keywords', 'user_detail', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function updatepassword(Request $request)
    {
        $validated = $request->validate(['password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/','confirm_password' => 'required|min:8|same:password',]);

        $email = $request->email;
        $user = User::where('email', $email)->get();

        $data = User::find($user[0]->id);
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect()->to(url('/advertiser-user'));
    }

    // Creat-Advertise ---
    public function selectplan($id)
    {
        $metaTitle = 'Select Advertiser Plan | Scienze Jobs : Jobs for the scientist by the scientist';
        $metaDescription = 'Create Advetise Form Page.';
        $keywords = '';
        $user_detail = Seller::findOrFail($id);
        $plans = Advertisment::all();

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

        return view('front.ads.selectplan', compact('metaTitle', 'metaDescription', 'keywords', 'user_detail', 'plans', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function creatads($id)
    {
        $metaTitle = 'Create Advetise | Scienze Jobs : Jobs for the scientist by the scientist';
        $metaDescription = 'Create Advetise Form Page.';
        $keywords = '';

        $user = Auth::user();
        $user_id = $user->data_id;
        $user_detail = Seller::findOrFail($user_id);
        $plans = Advertisment::findOrFail($id);

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

        return view('front.ads.creatads', compact('metaTitle', 'metaDescription', 'keywords', 'user_detail', 'plans', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function createadvertise(Request $request)
    {
        $validated = $request->validate(['name' => 'required','link' => 'required','checkbox' => 'required',]);

        $ads = new Advertise();
        $ads->user_id = $request->user_id;
        $ads->user_email = $request->email;
        $ads->plan_id = $request->plan_id;
        $ads->plan_name = $request->plan_name;
        $ads->name = $request->name;
        $ads->link = $request->link;
        $ads->accept_terms = 1;
        if($request->file('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\advertise'), $filename);
            $ads->image = $filename;
        }
        $ads->save();

        return redirect()->to(url('/advertiser-user'));
    }

}
