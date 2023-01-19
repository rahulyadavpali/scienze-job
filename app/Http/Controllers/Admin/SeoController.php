<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Auth;

class SeoController extends Controller
{
    public function index()
    {
        if(! Gate::allows('home_access')){return abort(401);}
        $seo = Seo::all();

        return view('admin.seo.index', compact('seo'));
    }

    public function show($id)
    {
        if(! Gate::allows('home_view')){return abort(401);}
        $seo = Seo::findOrFail($id);

        return view('admin.seo.show', compact('seo'));
    }

    public function edit($id)
    {
        if(! Gate::allows('home_edit')){return abort(401);}
        $seo = Seo::findOrFail($id);

        return view('admin.seo.edit', compact('seo'));
    }

    public function update(Request $request, $id)
    {
        if(! Gate::allows('information_edit')){return abort(401);}
        $validated = $request->validate(['page' => 'required','meta_title' => 'required','meta_description' => 'required']);

        $seo = Seo::find($id);
        $seo->page = $request->page;
        $seo->meta_title = $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keyword = $request->meta_keyword;
        $seo->save();

        return redirect()->route('admin.seo.index');
    }

}
