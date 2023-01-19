<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;

class BlogController extends Controller
{
    public function index()
    {
        if (! Gate::allows('blog_access')){return abort(401);}

        $blog = Blog::all();
        $blog = $blog->reverse();

        return view('admin.blog.index', compact('blog'));
    }

    public function create()
    {
        if (! Gate::allows('blog_create')) {return abort(401);}

        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        if(! Gate::allows('blog_create')){return abort(401);}

        $validated = $request->validate(
            [
                'blog_title' => 'required',
                'sub_para' => 'required|max:300',
                'poste_date' => 'required',
                'category' => 'required',
                'blog_description' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keywords' => 'required',
                'feature_img' => 'required|image|mimes:jpg,png,jpeg,svg',
            ]
        );

        $data = new Blog();
        $data->title = $request->blog_title;
        $data->sub_para = $request->sub_para;
        $data->posting_date = $request->poste_date;
        $data->category = $request->category;
        $data->description = $request->blog_description;
        $data->author_name = $request->author_name;
        $data->author_comment = $request->author_comment;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keywords = $request->meta_keywords;
        if($request->file('feature_img'))
        {
            $file = $request->file('feature_img');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\blog'), $filename);
            $data->feature_img = $filename;
        }
        $data->save();

        return redirect()->route('admin.blog.index');
    }

    public function show($id)
    {
        if(! Gate::allows('blog_view')){return abort(401);}
        $blog = Blog::findOrFail($id);

        return view('admin.blog.show', compact('blog'));
    }

    public function edit($id)
    {
        if(! Gate::allows('blog_edit')){return abort(401);}
        $blog = Blog::findOrFail($id);

        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        if(! Gate::allows('blog_edit')){return abort(401);}

        $validated = $request->validate(
            [
                'title' => 'required',
                'sub_para' => 'required|max:300',
                'posting_date' => 'required',
                'category' => 'required',
                'description' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keywords' => 'required',
            ]
        );

        $data = Blog::find($id);
        $data->title = $request->title;
        $data->sub_para = $request->sub_para;
        $data->posting_date = $request->posting_date;
        $data->category = $request->category;
        $data->description = $request->description;
        $data->author_name = $request->author_name;
        $data->author_comment = $request->author_comment;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keywords = $request->meta_keywords;
        if($request->file('feature_img'))
        {
            $file = $request->file('feature_img');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\blog'), $filename);
            $data->feature_img = $filename;
        }
        $data->save();

        return redirect()->route('admin.blog.index');
    }

    public function destroy($id)
    {
        if(! Gate::allows('blog_delete')){return abort(401);}
        $job = Blog::findOrFail($id);
        $job->delete();

        return back();
        // return redirect()->route('admin.job.index');
    }

    public function massDestroy(Request $request)
    {
        if(! Gate::allows('blog_delete')){return abort(401);}

        if ($request->input('ids')) {
            $entries = Blog::whereIn('id', $request->input('ids'))->get();

            foreach($entries as $entry){
                $entry->delete();
            }
        }
    }

}
