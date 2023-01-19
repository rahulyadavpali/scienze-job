@extends('layouts.app')

@section('content')
    <h3 class="page-title">Current Forms</h3>
    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_list')</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Form Name</th>
                        <th>Form Use</th>
                        <th>@lang('quickadmin.information.fields.meta_title')</th>
                        <th>@lang('quickadmin.information.fields.meta_keyword')</th>
                        <th>@lang('quickadmin.information.fields.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($form) > 0)
                        @foreach ($form as $form)
                            <tr data-entry-id="{{ $form->id }}">
                                <td>{{ $form->name }}</td>
                                <td>{{ $form->use }}</td>
                                <td>{{ $form->meta_title }}</td>
                                <td>{{ $form->meta_keyword }}</td>
                                <td>
                                    @can('form_view')
                                    <a href="{{ route('admin.form.show',[$form->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('form_edit')
                                    <a href="{{ route('admin.form.edit',[$form->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
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
    </div>
@stop

@section('javascript') 
    <script>
        @can('form_delete')
            // window.route_mass_crud_entries_destroy = '{{ route('admin.form.mass_destroy') }}';
        @endcan
    </script>
@endsection