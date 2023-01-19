<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Advertisment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Auth;
class AdvertisementController extends Controller
{
    public function index()
    {
        if(! Gate::allows('plan_access')){return abort(401);}
        $plan = Advertisment::all();
        return view('admin.advertisment.index', compact('plan'));
    }

    public function show($id)
    {
        if(! Gate::allows('plan_access')){return abort(401);}
        $plans = Advertisment::findOrFail($id);
        return view('admin.advertisment.show', compact('plans'));
    }

    public function edit($id)
    {
        if(! Gate::allows('plan_edit')){return abort(401);}
        $plans = Advertisment::findOrFail($id);
        return view('admin.advertisment.edit', compact('plans'));
    }

    public function update(Request $request)
    {
        if(! Gate::allows('plan_edit')){return abort(401);}
        $validated = $request->validate(
            [
                'plan_name' => 'required',
                'plan_description' => 'required',
                'location' => 'required',
                'plan_price' => 'required',
            ]
        );
        $id = $request->id;

        $plan = Advertisment::find($id);
        $plan->plan_name = $request->plan_name;
        $plan->plan_description = $request->plan_description;
        $plan->location = $request->location;
        $plan->plan_price = $request->plan_price;
        $plan->save();

        return redirect()->route('admin.advertisment.index');
    }

    public function destroy($id)
    {
        if(! Gate::allows('plan_delete')){return abort(401);}
        $plan = Advertisment::findOrFail($id);
        $plan->delete();

        return back();
        // return redirect()->route('admin.plan.index');
    }

    public function massDestroy(Request $request)
    {
        if(! Gate::allows('job_delete')){return abort(401);}
        if ($request->input('ids')) {
            $plan = Advertisment::whereIn('id', $request->input('ids'))->get();
            foreach($plan as $plans){$plans->delete();}
        }
    }

}
