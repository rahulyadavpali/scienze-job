@extends('layouts.app')
@section('content')
    <h3 class="page-title">FAQ</h3>
    <p>
        <a href="{{ route('admin.faq.create') }}" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New FAQ</a>
    </p>
    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_list')</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($faq) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($faq) > 0)
                    @foreach ($faq as $job)
                            <tr data-entry-id="{{ $job->id }}">
                                <td>{{ $job->title }}</td>
                                <td>{!! $job->description !!}</td>
                                <td>
                                    <a href="{{ route('admin.faq.show',[$job->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    <a href="{{ route('admin.faq.edit',[$job->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @can('job_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.faq.destroy', $job->id])) !!}
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
        @can('home_delete')@endcan
    </script>
@endsection