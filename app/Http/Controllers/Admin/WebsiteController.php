<?php

namespace App\Http\Controllers\Admin;

use URL;
use Auth;
use App\Websites;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

class WebsiteController extends Controller
{
    public function index()
    {
        if(!Gate::allows('plan_access')){return abort(401);}
        $website = Websites::all();

        return view('admin.website.index', compact('website'));
    }

    public function create()
    {
        if(!Gate::allows('plan_create')){return abort(401);}
        return view('admin.website.create');
    }

    public function store(Request $request)
    {
        if(!Gate::allows('plan_create')){return abort(401);}
        $validated = $request->validate(['name' => 'required','link' => 'required', 'logo' => 'required']);

        $data = new Websites();
        $data->name = $request->name;
        $data->link = $request->link;
        $data->main_url = $request->main_url;
        if($request->file('logo'))
        {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\websites-logo'), $filename);
            $data->logo = $filename;
        }
        $data->save();

        return redirect()->route('admin.website.index');
    }

    public function edit($id)
    {
        if(! Gate::allows('plan_edit')){return abort(401);}
        $plans = Websites::findOrFail($id);

        return view('admin.website.edit', compact('plans'));
    }

    public function update(Request $request)
    {
        if(!Gate::allows('plan_create')){return abort(401);}
        $validated = $request->validate(['name' => 'required','link' => 'required',]);

        $id = $request->id;
        $data = Websites::find($id);
        $data->name = $request->name;
        $data->link = $request->link;
        $data->main_url = $request->main_url;
        if($request->file('e_logo'))
        {
            $file = $request->file('e_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\websites-logo'), $filename);
            $data->logo = $filename;
        }
        $data->save();

        return redirect()->route('admin.website.index');
    }

    public function destroy($id)
    {
        if(! Gate::allows('plan_delete')){return abort(401);}
        $plan = Websites::findOrFail($id);
        $plan->delete();
        return redirect()->route('admin.website.index');
    }

    public function massDestroy(Request $request)
    {
        if(! Gate::allows('job_delete')){return abort(401);}
        if ($request->input('ids'))
        {
            $plan = Websites::whereIn('id', $request->input('ids'))->get();
            foreach($plan as $plans){$plans->delete();}
        }
    }

}
