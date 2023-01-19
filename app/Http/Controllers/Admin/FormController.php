<?php

namespace App\Http\Controllers\Admin;

use App\Form;
use App\FormFields;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Auth;

class FormController extends Controller
{
    public function index()
    {
        if(!Gate::allows('form_access')){return abort(401);}
        $form = Form::all();

        return view('admin.form.index', compact('form'));
    }

    public function show($id)
    {
        if(! Gate::allows('form_view')){return abort(401);}
        $form = Form::findOrFail($id);
        $formfield = FormFields::where('form_id',$id)->get();

        return view('admin.form.show', compact('form', 'formfield'));
    }

    public function create()
    {
        if(! Gate::allows('form_create')){return abort(401);}
        return view('admin.form.create');
    }

    public function edit($id)
    {
        if(! Gate::allows('form_edit')){return abort(401);}
        $form = Form::findOrFail($id);

        return view('admin.form.edit', compact('form'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'use' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keyword' => 'required',
            ]
        );

        $form = Form::find($id);
        $form->name = $request->name;
        $form->use = $request->use;
        $form->meta_title = $request->meta_title;
        $form->meta_description = $request->meta_description;
        $form->meta_keyword = $request->meta_keyword;
        $form->save();

        return redirect()->route('admin.form.index');
    }

    public function create_table($id)
    {
        if(! Gate::allows('form_create')){return abort(401);}
        $form_id = $id;

        return view('admin.form.create_table', compact('form_id'));
    }

    public function add_table(Request $request)
    {
        $validated = $request->validate(
            [
                'form_label' => 'required',
                'field_type' => 'required',
                'field_name' => 'required',
                'field_id' => 'required',
                'placeholder' => 'required',
                'required' => 'required',
                'status' => 'required',
            ]
        );

        $table = new FormFields();
        $table->form_id = $request->formid;
        $table->form_label = $request->form_label;
        $table->field_type = $request->field_type;
        $table->field_name = $request->field_name;
        $table->field_id = $request->field_id;
        $table->placeholder = $request->placeholder;
        $table->required = $request->required;
        $table->status = $request->status;
        $table->save();

        return redirect()->route('admin.form.index');
    }

    public function edit_table($id)
    {
        if(! Gate::allows('form_edit')){return abort(401);}
        $form_table = FormFields::findOrFail($id);

        return view('admin.form.tableedit', compact('form_table'));
    }

    public function update_table(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'form_label' => 'required',
                'field_type' => 'required',
                'field_name' => 'required',
                'field_id' => 'required',
                'placeholder' => 'required',
                'required' => 'required',
                'status' => 'required',
            ]
        );

        $table = FormFields::find($id);
        $table->form_label = $request->form_label;
        $table->field_type = $request->field_type;
        $table->field_name = $request->field_name;
        $table->field_id = $request->field_id;
        $table->placeholder = $request->placeholder;
        $table->required = $request->required;
        $table->status = $request->status;
        $table->save();

        return redirect()->route('admin.form.index');
    }

}
