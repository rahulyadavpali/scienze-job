<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Auth;

class FaqController extends Controller
{
    public function index()
    {
        if(!Gate::allows('home_access')){return abort(401);}
        $faq = Faq::all();
        return view('admin.faq.index', compact('faq'));
    }

    public function create()
    {
        if(! Gate::allows('home_create')){return abort(401);}
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        if(! Gate::allows('home_create')){return abort(401);}
        $validated = $request->validate(['title' => 'required','description' => 'required',]);

        $data = new Faq();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('admin.faq.index');
    }

    public function show($id)
    {
        if(! Gate::allows('home_access')){return abort(401);}
        $faq = Faq::findOrFail($id);
        return view('admin.faq.show', compact('faq'));
    }

    public function edit($id)
    {
        if(! Gate::allows('category_edit')){return abort(401);}
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        if(! Gate::allows('home_create')){return abort(401);}
        $validated = $request->validate(['title' => 'required','description' => 'required',]);

        $data = Faq::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('admin.faq.index');
    }

    public function destroy($id)
    {
        if(! Gate::allows('home_delete')){return abort(401);}
        $category = Faq::findOrFail($id);
        $category->delete();
        return back();
        // return redirect()->route('admin.category.index');
    }

    public function massDestroy(Request $request)
    {
        if(! Gate::allows('home_delete')){return abort(401);}
        if ($request->input('ids'))
        {
            $entries = Faq::whereIn('id', $request->input('ids'))->get();
            foreach($entries as $entry)
            {
                $entry->delete();
            }
        }
    }

}
