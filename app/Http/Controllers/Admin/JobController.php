<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Job;
use App\Jobs;
use App\Apply;
use App\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;

class JobController extends Controller
{
    public function index()
    {
        if(! Gate::allows('job_access')){return abort(401);}
        $job = Employer::all();
        $job = $job->reverse();

        return view('admin.job.index', compact('job'));
    }

    public function create()
    {
        if(! Gate::allows('job_create')){return abort(401);}
        return view('admin.job.create');
    }

    public function store(Request $request)
    {
        if(! Gate::allows('job_create')){return abort(401);}
        $validated = $request->validate(
            [
                'company_name' => 'required',
                'job_title' => 'required',
                'job_time' => 'required',
                'address' => 'required',
                'date_posted' => 'required',
                'hours' => 'required',
                'salary' => 'required',
                'category' => 'required',
                'experience' => 'required',
                'job_type'=> 'required',
                'job_description' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'feature_img' => 'required|image|mimes:jpg,png,jpeg,svg',
            ]
        );

        $data = new Employer();
        $data->company_name = $request->company_name;
        $data->company_link = $request->company_link;
        $data->address = $request->address;
        $data->job_title = $request->job_title;
        $data->job_time = $request->job_time;
        $data->date_posted = $request->date_posted;
        $data->hours = $request->hours;
        $data->salary = $request->salary;
        $data->category = $request->category;
        $data->experience = $request->experience;
        $data->job_decription = $request->job_description;
        $data->min_qualification = $request->min_qualification;
        $data->how_apply = $request->how_apply;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        if($request->file('feature_img'))
        {
            $file = $request->file('feature_img');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\gallery'), $filename);
            $data->company_logo = $filename;
        }
        $data->save();

        return redirect()->route('admin.job.index');
    }

    public function show($id)
    {
        if(! Gate::allows('job_view')){return abort(401);}
        $job = Employer::findOrFail($id);

        return view('admin.job.show', compact('job'));
    }

    public function edit($id)
    {
        if(! Gate::allows('job_edit')){return abort(401);}
        $job = Employer::findOrFail($id);
        return view('admin.job.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        if(! Gate::allows('job_edit')){return abort(401);}
        $validated = $request->validate(
            [
                'company_name' => 'required',
                'job_title' => 'required',
                'job_time' => 'required',
                'address' => 'required',
                'date_posted' => 'required',
                'job_type'=> 'required',
                'hours' => 'required',
                'salary' => 'required',
                'category' => 'required',
                'experience' => 'required',
                'job_decription' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
            ]
        );

        $data = Employer::find($id);
        $data->company_name = $request->company_name;
        $data->company_link = $request->company_link;
        $data->address = $request->address;
        $data->job_type = $request->job_type;
        $data->job_title = $request->job_title;
        $data->job_time = $request->job_time;
        $data->date_posted = $request->date_posted;
        $data->hours = $request->hours;
        $data->salary = $request->salary;
        $data->category = $request->category;
        $data->experience = $request->experience;
        $data->job_decription = $request->job_decription;
        $data->min_qualification = $request->min_qualification;
        $data->how_apply = $request->how_apply;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        if($request->file('company_logo'))
        {
            $file = $request->file('company_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\gallery'), $filename);
            $data->company_logo = $filename;
        }
        $data->save();

        return redirect()->route('admin.job.index');
    }

    public function destroy($id)
    {
        if(! Gate::allows('job_delete')){return abort(401);}
        $job = Employer::findOrFail($id);
        $job->delete();
        return back();
        // return redirect()->route('admin.job.index');
    }

    public function massDestroy(Request $request)
    {
        if(! Gate::allows('job_delete')){return abort(401);}
        if($request->input('ids'))
        {
            $entries = Employer::whereIn('id', $request->input('ids'))->get();
            foreach($entries as $entry){$entry->delete();}
        }
    }

    public function view_applicant($id)
    {
        if(! Gate::allows('job_view')){return abort(401);}
        $applicant = Jobs::where('employer_id',$id)->get();
        return view('admin.job.applicant', compact('applicant'));
    }

    public function delete_job($id)
    {
        if(! Gate::allows('job_delete')){return abort(401);}
        $job = Jobs::findOrFail($id);
        $job->delete();
        return back();
    }

}
