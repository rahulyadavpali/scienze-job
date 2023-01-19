<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Plans;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Auth;

class PlanController extends Controller
{
    public function index()
    {
        if(! Gate::allows('plan_access')){return abort(401);}

        $plan = Plans::all();
        return view('admin.plans.index', compact('plan'));
    }

    public function create()
    {
        if(! Gate::allows('plan_create')){return abort(401);}

        return view('admin.plans.create');
    }

    public function store(Request $request)
    {
        if(! Gate::allows('plan_create')){return abort(401);}
        $validated = $request->validate(
            [
                'plan_title' => 'required',
                'plan_price' => 'required',
                'plan_description' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keywords' => 'required',
            ]
        );

        $plan = new Plans();
        $plan->plan_title = $request->plan_title;
        $plan->plan_price = $request->plan_price;
        $plan->plan_description = $request->plan_description;
        $plan->meta_title = $request->meta_title;
        $plan->meta_description = $request->meta_description;
        $plan->meta_keywords = $request->meta_keywords;
        $plan->save();
        
        return redirect()->route('admin.plan.index');
    }

    public function show($id)
    {
        if(! Gate::allows('plan_access')){return abort(401);}
        $plans = Plans::findOrFail($id);

        return view('admin.plans.show', compact('plans'));
    }

    public function edit($id)
    {
        if(! Gate::allows('plan_edit')){return abort(401);}
        $plans = Plans::findOrFail($id);

        return view('admin.plans.edit', compact('plans'));
    }

    public function update(Request $request)
    {
        if(! Gate::allows('plan_edit')){return abort(401);}
        $validated = $request->validate(
            [
                'plan_title' => 'required',
                'plan_price' => 'required',
                'plan_description' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keywords' => 'required',
            ]
        );
        $id = $request->id;

        $plan = Plans::find($id);
        $plan->plan_title = $request->plan_title;
        $plan->plan_price = $request->plan_price;
        $plan->plan_description = $request->plan_description;
        $plan->meta_title = $request->meta_title;
        $plan->meta_description = $request->meta_description;
        $plan->meta_keywords = $request->meta_keywords;
        $plan->save();
        
        return redirect()->route('admin.plan.index');
    }

    public function destroy($id)
    {
        if(! Gate::allows('plan_delete')){return abort(401);}
        $plan = Plans::findOrFail($id);
        $plan->delete();

        return back();
        // return redirect()->route('admin.plan.index');
    }

    public function massDestroy(Request $request)
    {
        if(! Gate::allows('job_delete')){return abort(401);}
        if ($request->input('ids')) {
            $plan = Plans::whereIn('id', $request->input('ids'))->get();
            foreach($plan as $plans){$plans->delete();}
        }
    }

}
