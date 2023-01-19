<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;

class SettingController extends Controller
{
    public function index()
    {
        if (! Gate::allows('setting_access')){return abort(401);}
        $setting = Setting::all();

        return view('admin.setting.index', compact('setting'));
    }

    public function edit($id)
    {
        if(! Gate::allows('setting_edit')){return abort(401);}
        $setting = Setting::findOrFail($id);

        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        if(! Gate::allows('setting_edit')){return abort(401);}
        $validated = $request->validate(['value' => 'required']);

        $setting = Setting::find($id);
        if($request->file('value'))
        {
            $file = $request->file('value');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\gallery'), $filename);
            $setting->value = $filename;
        }
        else
        {
            $setting->value = $request->value;
        }
        $setting->save();

        return redirect()->route('admin.setting.index');
    }

}
