@extends('layouts.app')

@section('content')
    <h3 class="page-title">Jobs Types</h3>
    <p>
        <a href="{{ route('admin.jobtype.create') }}" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Job Type</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_list')</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($job) > 0 ? 'datatable' : '' }} @can('designation_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('designation_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>Job Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($job) > 0)
                    @foreach ($job as $job)
                            <tr data-entry-id="{{ $job->id }}">
                                @can('designation_delete')
                                    <td></td>
                                @endcan
                                <td>{{ $job->title }}</td>
                                <td>
                                    @can('blog_edit')
                                        <a href="{{ route('admin.jobtype.edit', [$job->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('designation_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.jobtype.destroy', $job->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
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
        @can('designation_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.designation.mass_destroy') }}';
        @endcan
    </script>
@endsection