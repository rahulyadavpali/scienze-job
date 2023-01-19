<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;

class JobtypeController extends Controller
{
    public function index()
    {
        if(! Gate::allows('designation_access')){return abort(401);}
        $job = JobType::all();

        return view('admin.jobtype.index', compact('job'));
    }

    public function create()
    {
        if(! Gate::allows('designation_access')){return abort(401);}

        return view('admin.jobtype.create');
    }

    public function store(Request $request)
    {
        if(! Gate::allows('designation_access')){return abort(401);}
        $validated = $request->validate(['title' => 'required',]);

        $data = new JobType();
        $data->title = $request->title;
        $data->save();

        return redirect()->route('admin.jobtype.index');
    }

    public function edit($id)
    {
        if(! Gate::allows('designation_edit')){return abort(401);}
        $job = JobType::findOrFail($id);

        return view('admin.jobtype.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        if(! Gate::allows('designation_access')){return abort(401);}
        $validated = $request->validate(['title' => 'required',]);

        $data = JobType::find($id);
        $data->title = $request->title;
        $data->save();

        return redirect()->route('admin.jobtype.index');
    }

    public function destroy($id)
    {
        if(! Gate::allows('designation_delete')){return abort(401);}
        $designation = JobType::findOrFail($id);
        $designation->delete();
        return back();
        // return redirect()->route('admin.jobtype.index');
    }

    public function massDestroy(Request $request)
    {
        if(! Gate::allows('designation_delete')){return abort(401);}
        if ($request->input('ids'))
        {
            $entries = JobType::whereIn('id', $request->input('ids'))->get();
            foreach($entries as $entry){$entry->delete();}
        }
    }

}
