<?php

namespace App\Http\Controllers\Front;

use App\Seo;
use App\Contact;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $seo = Seo::findOrFail('4');
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

        return view('front.pages.contact', compact('metaTitle', 'metaDescription', 'keywords', 'logo', 'email', 'phone', 'address', 'map', 'paragraph_title', 'paragraph', 'facebook', 'twitter', 'instagram', 'linkedin'));
    }

    public function capthcaFormValidate(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|string',
                'message' => 'required',
                'captcha' => 'required|captcha'
            ],
            [
                'email.string' => 'email should be valid.',
                'email.email' => 'email should be in proper format.',
                'captcha.captcha'=>'Invalid captcha code.',
            ]
        );
        dd($request);

        $data = new Contact();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;
        $data->save();

        return response()->json(['success'=>'You are register successfully.']);
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('inverse')]);
    }

}
