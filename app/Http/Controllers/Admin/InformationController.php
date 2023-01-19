<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Contact;
use App\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Auth;

class InformationController extends Controller
{
    public function index()
    {
        if (! Gate::allows('information_access')){return abort(401);}
        $information = Information::all();
        $information = $information->reverse();

        return view('admin.information.index', compact('information'));
    }

    public function create()
    {
        if(! Gate::allows('information_create')){return abort(401);}

        return view('admin.information.create');
    }

    public function store(Request $request)
    {
        if(! Gate::allows('information_create')){return abort(401);}
        $validated = $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'meta_title' => 'required',
            ],
        );

        $information = new Information();
        $information->title = $request->title;
        $information->description = $request->description;
        $information->meta_title = $request->meta_title;
        $information->meta_description = $request->meta_description;
        $information->meta_keywords = $request->meta_keywords;
        $information->save();

        return redirect()->route('admin.information.index');
    }

    public function edit($id)
    {
        if(! Gate::allows('information_edit')){return abort(401);}
        $information = Information::findOrFail($id);

        return view('admin.information.edit', compact('information'));
    }

    public function update(Request $request, $id)
    {
        if(! Gate::allows('information_edit')){return abort(401);}
        $validated = $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'meta_title' => 'required',
            ]
        );

        $information = Information::find($id);
        $information->title = $request->title;
        $information->description = $request->description;
        $information->meta_title = $request->meta_title;
        $information->meta_description = $request->meta_description;
        $information->meta_keywords = $request->meta_keywords;
        $information->save();

        return redirect()->route('admin.information.index');
    }

    public function show($id)
    {
        if(! Gate::allows('information_view')){return abort(401);}
        $information = Information::findOrFail($id);

        return view('admin.information.show', compact('information'));
    }

    public function destroy($id)
    {
        if(! Gate::allows('information_delete')){return abort(401);}
        $information = Information::findOrFail($id);
        $information->delete();

        return redirect()->route('admin.information.index');
    }

    public function massDestroy(Request $request)
    {
        if(! Gate::allows('information_delete')){return abort(401);}
        if($request->input('ids'))
        {
            $entries = Information::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry){$entry->delete();}
        }
    }

    // ContactUs-List ---
    public function contactlist()
    {
        if(! Gate::allows('information_access')){return abort(401);}
        $information = Contact::all();

        return view('admin.information.contact', compact('information'));
    }

    public function mass_destroy_contact(Request $request)
    {
        if(! Gate::allows('information_delete')){return abort(401);}
        if($request->input('ids'))
        {
            $entries = Contact::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry){$entry->delete();}
        }
    }

}
