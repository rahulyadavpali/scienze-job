<?php

namespace App\Http\Controllers\Front;

use Image;
use App\Form;
use App\Setting;
use App\Category;
use App\FormFields;
use App\Subcategory;
use App\Designation;
use App\Registration;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class RegisterController extends Controller
{
    public function index()
    {
        $id = 2;
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

        $form = Form::findOrFail($id);
        $formfield = FormFields::where('form_id',$id)->get();

        $category = Category::all();
        $subcategory = Subcategory::all();
        $designation = Designation::all();

        return view('front.pages.registration', compact('metaTitle', 'metaDescription', 'keywords', 'form', 'formfield', 'category', 'subcategory', 'designation', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function show($id)
    {
        $metaTitle = 'Registration For Contest | Prize Pool';
        $metaDescription = 'Registration For Contest Page of Prize Pool.';
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

        return view('front.pages.registration', compact('contest', 'metaTitle', 'metaDescription', 'keywords', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:registration',
                'phone' => 'required|numeric',
                'registration_id' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,svg',
                'resume' => 'required',
                'last_work' => 'required',
                'designation' => 'required',
                'salary' => 'required',
                'address' => 'required',
                'zip_code' => 'required',
                'city' => 'required',
                'state' => 'required',
                'categories' => 'required',
                'subcategories' => 'required',
                'selection_job' => 'required',
                'agree' => 'required',
            ],
        );

        $data = new Registration();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->o_phone = $request->o_phone;
        $data->registration_id = $request->registration_id;
        $data->last_work = $request->last_work;
        $data->designation = $request->designation;
        $data->salary = $request->salary;
        $data->address = $request->address;
        $data->zip_code = $request->zip_code;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->expectations = $request->expectations;
        $data->remarks = $request->remarks;
        $data->categories = $request->categories;
        $data->subcategories = $request->subcategories;
        $data->selection_job = $request->selection_job;
        $data->agree = $request->agree;
        if($request->file('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = rand(1,9999999999).".".$extension;
            $path = Storage::disk('applicant_image')->put($file_name, file_get_contents($file));
            $data->image = $file_name;
        }
        if($request->file('resume'))
        {
            $file = $request->file('resume');
            $extension = $file->getClientOriginalExtension();
            $resume_name = rand(1,9999999999).".".$extension;
            $path = Storage::disk('applicant_cv')->put($resume_name, file_get_contents($file));
            $data->resume = $resume_name;
        }
        $data->save();

        return redirect()->to(url('/register-successfully'));
    }

    public function success()
    {
        $metaTitle = 'User Created Successfully | The Scienze Job';
        $metaDescription = 'User created successfully.';
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

        return view('front.pages.register_success', compact('metaTitle', 'metaDescription', 'keywords', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

}
