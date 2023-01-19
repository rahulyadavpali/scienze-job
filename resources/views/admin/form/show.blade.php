@extends('layouts.app')

@section('content')
    <h3 class="page-title">Form View</h3>
    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_view')</div>

        <div class="panel-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Form Name</th>
                            <td>{{ $form->name }}</td>
                        </tr>
                        <tr>
                            <th>Use Of Form</th>
                            <td>{!! $form->use !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.information.fields.meta_title')</th>
                            <td>{{ $form->meta_title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.information.fields.meta_description')</th>
                            <td>{{ $form->meta_description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.information.fields.meta_keyword')</th>
                            <td>{{ $form->meta_keyword }}</td>
                        </tr>
                    </table>
                    <h2>Form Fields :</h2>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Form Label</th>
                                <th>Form Field</th>
                                <th>Form Type</th>
                                <th>Placeholder</th>
                                <th>Required</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($formfield) > 0)
                                @foreach ($formfield as $formfields)
                                    <tr>
                                        <td></td>
                                        <td>{{ $formfields->form_label }}</td>
                                        <td>{{ $formfields->field_name }}</td>
                                        <td>{{ $formfields->field_type }}</td>
                                        <td>{{ $formfields->placeholder }}</td>
                                        <td>
                                            <?php if($formfields->required == 1){echo 'Required*';}else{echo 'Not Required';} ?>
                                        </td>
                                        <td>
                                            <?php if($formfields->status == 1){echo '<span style="color:#00cc00">Active</span>';}else{echo '<span style="color:#ff0000">Inactive</span>';} ?>
                                        </td>
                                        <td>
                                            @can('form_edit')
                                                <a href="{{ route('admin.form.edit_table',[$formfields->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="col-12" style="text-align: right;padding: 0 10px;">
                    @can('form_view')
                        <a href="{{ route('admin.form.create_table',[$form->id]) }}" class="btn btn-xs btn-success" style="padding: 5px 10px;font-size: 16px;">Add New Field</a>
                    @endcan
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('admin.form.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop