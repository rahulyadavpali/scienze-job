<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;

class JoblocationController extends Controller
{
    public function index()
    {
        if(! Gate::allows('designation_access')){return abort(401);}
        $job = Location::all();
        return view('admin.location.index', compact('job'));
    }

    public function create()
    {
        if(! Gate::allows('designation_access')){return abort(401);}
        return view('admin.location.create');
    }

    public function store(Request $request)
    {
        if(! Gate::allows('designation_access')){return abort(401);}
        $validated = $request->validate(['location' => 'required',]);
        $id = Location::max('id')+1;

        $data = new Location();
        $data->location_id = $id;
        $data->location = $request->location;
        $data->save();

        return redirect()->route('admin.joblocation.index');
    }

    public function edit($id)
    {
        if(! Gate::allows('designation_edit')){return abort(401);}
        $job = Location::findOrFail($id);

        return view('admin.location.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        if(! Gate::allows('designation_access')){return abort(401);}
        $validated = $request->validate(['location' => 'required',]);

        $data = Location::find($id);
        $data->location = $request->location;
        $data->save();

        return redirect()->route('admin.joblocation.index');
    }

    public function destroy($id)
    {
        if(! Gate::allows('designation_delete')){return abort(401);}
        $designation = Location::findOrFail($id);
        $designation->delete();
        return back();
    }

    public function massDestroy(Request $request)
    {
        if(! Gate::allows('designation_delete')){return abort(401);}
        if ($request->input('ids'))
        {
            $entries = Location::whereIn('id', $request->input('ids'))->get();
            foreach($entries as $entry){$entry->delete();}
        }
    }

}
