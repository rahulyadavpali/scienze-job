<?php

namespace App\Http\Controllers\Admin;

use App\Apply;
use App\Jobseeker;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        if(! Gate::allows('registration_access')){return abort(401);}
        $registration = Jobseeker::all();
        $registration = $registration->reverse();

        return view('admin.registration.index', compact('registration'));
    }

    public function show($id)
    {
        if(! Gate::allows('registration_view')){return abort(401);}
        $registration = Jobseeker::findOrFail($id);
        $subcategory = Subcategory::all();

        return view('admin.registration.show', compact('registration', 'subcategory'));
    }

    public function destroy($id)
    {
        if(! Gate::allows('registration_delete')){return abort(401);}
        $registration = Jobseeker::findOrFail($id);
        $registration->delete();

        return redirect()->route('admin.registration.index');
    }

    public function massDestroy(Request $request)
    {
        if(! Gate::allows('registration_delete')){return abort(401);}
        if($request->input('ids'))
        {
            $entries = Jobseeker::whereIn('id', $request->input('ids'))->get();
            foreach($entries as $entry){$entry->delete();}
        }
    }

}
