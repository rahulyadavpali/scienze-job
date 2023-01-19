<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Category;
use App\Categories;
use App\Subcategory;
use App\GroupCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;

class CategoryController extends Controller
{
    public function index()
    {
        if (! Gate::allows('category_access')){return abort(401);}
        $category = Categories::all();

        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        if (! Gate::allows('category_access')) {return abort(401);}
        $g_category = GroupCategory::all();
        $category = Category::all();

        return view('admin.category.create', compact('g_category', 'category'));
    }

    public function store(Request $request)
    {
        if(! Gate::allows('category_create')){return abort(401);}
        $validated = $request->validate(
            [
                'm_categroy' => 'required',
                'title' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
            ]
        );

        $data = new Categories();
        $data->parent_id = $request->m_categroy;
        $data->name = $request->title;
        $data->description = $request->description;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keyword = $request->meta_keyword;
        $data->save();

        return redirect()->route('admin.category.index');
    }

    public function show($id)
    {
        if(! Gate::allows('category_access')){return abort(401);}
        $category = Category::findOrFail($id);
        $subcategory = Subcategory::where('category_id',$id)->get();

        return view('admin.category.show', compact('category', 'subcategory'));
    }

    public function edit($id)
    {
        if(! Gate::allows('category_edit')){return abort(401);}
        $category = Categories::findOrFail($id);
        $g_category = GroupCategory::all();
        $categories = Category::all();

        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        if(! Gate::allows('category_create')){return abort(401);}
        $validated = $request->validate(
            [
                'm_categroy' => 'required',
                'name' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
            ]
        );

        $data = Categories::find($id);
        $data->parent_id = $request->m_categroy;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keyword = $request->meta_keyword;
        $data->save();

        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        if(! Gate::allows('category_delete')){return abort(401);}
        $category = Categories::findOrFail($id);
        $category->delete();
        return back();
        // return redirect()->route('admin.category.index');
    }

    public function massDestroy(Request $request)
    {
        if(! Gate::allows('category_delete')){return abort(401);}
        if ($request->input('ids'))
        {
            $entries = Categories::whereIn('id', $request->input('ids'))->get();
            foreach($entries as $entry)
            {
                $entry->delete();
            }
        }
    }

}
