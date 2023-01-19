<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;

class DesignationController extends Controller
{
    public function index()
    {
        if (! Gate::allows('designation_access')){return abort(401);}
        $designation = Designation::all();

        return view('admin.designation.index', compact('designation'));
    }

    public function create()
    {
        if (! Gate::allows('designation_access')) {return abort(401);}

        return view('admin.designation.create');
    }

    public function store(Request $request)
    {
        if(! Gate::allows('designation_access')){return abort(401);}
        $validated = $request->validate(
            ['title' => 'required',]
        );

        $data = new Designation();
        $data->title = $request->title;
        $data->save();

        return redirect()->route('admin.designation.index');
    }

    public function edit($id)
    {
        if(! Gate::allows('designation_edit')){return abort(401);}
        $designation = Designation::findOrFail($id);

        return view('admin.designation.edit', compact('designation'));
    }

    public function update(Request $request, $id)
    {
        if(! Gate::allows('designation_access')){return abort(401);}
        $validated = $request->validate(
            ['title' => 'required',]
        );

        $data = Designation::find($id);
        $data->title = $request->title;
        $data->save();

        return redirect()->route('admin.designation.index');
    }

    public function destroy($id)
    {
        if(! Gate::allows('designation_delete')){return abort(401);}
        $designation = Designation::findOrFail($id);
        $designation->delete();
        return back();
        // return redirect()->route('admin.designation.index');
    }

    public function massDestroy(Request $request)
    {
        if(! Gate::allows('designation_delete')){return abort(401);}
        if ($request->input('ids'))
        {
            $entries = Designation::whereIn('id', $request->input('ids'))->get();
            foreach($entries as $entry){$entry->delete();}
        }
    }

}
