@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.information.title')</h3>
    <p>
        <a href="{{ route('admin.information.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_list')</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($information) > 0 ? 'datatable' : '' }} @can('information_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('information_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>@lang('quickadmin.information.fields.title')</th>
                        <th>@lang('quickadmin.information.fields.meta_title')</th>
                        <th>@lang('quickadmin.information.fields.meta_keyword')</th>
                        <th>@lang('quickadmin.information.fields.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($information) > 0)
                        @foreach ($information as $information)
                            <tr data-entry-id="{{ $information->id }}">
                                @can('information_delete')
                                    <td></td>
                                @endcan
                                <td>{{ $information->title }}</td>
                                <td>{{ $information->meta_title }}</td>
                                <td>{{ $information->meta_keywords }}</td>
                                <td>
                                    @can('information_view')
                                        <a href="{{ route('admin.information.show',[$information->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('information_edit')
                                        <a href="{{ route('admin.information.edit',[$information->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    <!-- @can('information_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.information.destroy', $information->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan -->
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
        @can('information_delete')
            // window.route_mass_crud_entries_destroy = '{{ route('admin.information.mass_destroy') }}';
        @endcan
    </script>
@endsection