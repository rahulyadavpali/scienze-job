<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;

class SubcategoryController extends Controller
{
    public function index()
    {
        if(! Gate::allows('category_access')){return abort(401);}
        $subcategory = Subcategory::all();
        $subcategory = $subcategory->reverse();

        return view('admin.subcategory.index', compact('subcategory'));
    }

    public function create()
    {
        if(! Gate::allows('category_access')) {return abort(401);}
        $category = Category::all();

        return view('admin.subcategory.create', compact('category'));
    }

    public function store(Request $request)
    {
        if(! Gate::allows('category_create')){return abort(401);}
        $validated = $request->validate(
            [
                'category_id' => 'required',
                'title' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
            ]
        );

        $data = new Subcategory();
        $data->category_id = $request->category_id;
        $data->title = $request->title;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->save();

        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        if(! Gate::allows('category_edit')){return abort(401);}
        $subcategory = Subcategory::findOrFail($id);
        $category = Category::all();

        return view('admin.subcategory.edit', compact('subcategory', 'category'));
    }

    public function update(Request $request, $id)
    {
        if(! Gate::allows('category_create')){return abort(401);}
        $validated = $request->validate(
            [
                'category_id' => 'required',
                'title' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
            ]
        );

        $data = Subcategory::find($id);
        $data->category_id = $request->category_id;
        $data->title = $request->title;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->save();

        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        if(! Gate::allows('category_delete')){return abort(401);}
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
        return back();
        // return redirect()->route('admin.category.index');
    }

    public function massDestroy(Request $request)
    {
        if(! Gate::allows('category_delete')){return abort(401);}
        if($request->input('ids'))
        {
            $entries = Subcategory::whereIn('id', $request->input('ids'))->get();
            foreach($entries as $entry){$entry->delete();}
        }
    }

}
