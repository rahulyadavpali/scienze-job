<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Banner;
use App\Review;
use App\Offers;
use App\Employer;
use App\Information;
use App\TopCompanies;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(! Gate::allows('home_access')){return abort(401);}

        $banner_id = 1;
        $banner = Banner::findOrFail($banner_id);

        return view('admin.home.index', compact('banner'));
    }

    // Home-Banner
    public function view_banner($id)
    {
        if(! Gate::allows('home_access')){return abort(401);}
        $banner = Banner::findOrFail($id);

        return view('admin.home.banner.index', compact('banner'));
    }

    public function edit_banner($id)
    {
        if(! Gate::allows('home_access')){return abort(401);}
        $banner = Banner::findOrFail($id);

        return view('admin.home.banner.edit', compact('banner'));
    }

    public function update_banner(Request $request)
    {
        if(! Gate::allows('home_edit')){return abort(401);}
        $validated = $request->validate(
            [
                'title' => 'required',
                'meta_tag' => 'required',
                'meta_description' => 'required',
                'meta_keywords' => 'required',
            ]
        );
        $id = $request->id;

        $banner = Banner::find($id);
        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->author = $request->author;
        $banner->meta_tag = $request->meta_tag;
        $banner->meta_description = $request->meta_description;
        $banner->meta_keywords = $request->meta_keywords;
        if($request->file('image') !== null)
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\gallery'), $filename);
            $banner->image = $filename;
        }
        $banner->save();

        return redirect()->route('admin.home.index');
    }

    // Top-Companies
    public function view_companies()
    {
        if(! Gate::allows('home_access')){return abort(401);}
        $companies = TopCompanies::all();

        return view('admin.home.companies.index', compact('companies'));
    }

    public function edit_companies($id)
    {
        if(! Gate::allows('home_access')){return abort(401);}
        $employer = Employer::all();
        $companies = TopCompanies::findOrFail($id);

        return view('admin.home.companies.edit', compact('companies', 'employer'));
    }

    public function update_companies(Request $request)
    {
        if(! Gate::allows('home_edit')){return abort(401);}
        $id = $request->rank_id;

        $banner = TopCompanies::find($id);
        $banner->emploayer_id = $request->rank;
        $banner->save();

        return redirect()->route('admin.home.view.companies');
    }

    // Clients-Review
    public function client_review()
    {
        if(! Gate::allows('home_access')){return abort(401);}
        $review = Review::all();

        return view('admin.home.review.index', compact('review'));
    }

    public function destroy($id)
    {
        if(! Gate::allows('home_delete')){return abort(401);}
        $review = Review::findOrFail($id);
        $review->delete();
        return back();
        // return redirect()->route('admin.designation.index');
    }

    // Offer-Section
    public function offer_section()
    {
        if(! Gate::allows('home_access')){return abort(401);}
        $offer = Offers::all();
        return view('admin.home.offers.index', compact('offer'));
    }

    public function offer_create()
    {
        if(! Gate::allows('home_create')){return abort(401);}
        return view('admin.home.offers.create');
    }

    public function offer_store(Request $request)
    {
        if(! Gate::allows('home_create')){return abort(401);}
        $validated = $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = new Offers();
        if($request->file('icon'))
        {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\icon'), $filename);
            $data->icon = $filename;
        }
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('admin.home.offers');
    }

    public function offer_edit($id)
    {
        if(! Gate::allows('home_edit')){return abort(401);}
        $offer = Offers::findOrFail($id);
        return view('admin.home.offers.edit', compact('offer'));
    }

    public function offer_update(Request $request, $id)
    {
        if(! Gate::allows('home_edit')){return abort(401);}
        $validated = $request->validate(['title' => 'required','description' => 'required',]);

        $data = Offers::find($id);
        if($request->file('icon'))
        {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(1,9999999999).".".$extension;
            $path = $file->move(public_path('upload\icon'), $filename);
            $data->icon = $filename;
        }
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('admin.home.offers');
    }

    public function offer_destroy($id)
    {
        if(! Gate::allows('home_delete')){return abort(401);}
        $job = Offers::findOrFail($id);
        $job->delete();

        return back();
        // return redirect()->route('admin.job.index');
    }

}
