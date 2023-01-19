@extends('layouts.app')
@section('content')
    <h3 class="page-title">All Institute</h3>
    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_list')</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($job) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        <th>Institute Name</th>
                        <th>Institute Logo</th>
                        <th>Institute URL</th>
                        <th>Author Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($job) > 0)
                    @foreach ($job as $job)
                            <tr data-entry-id="{{ $job->id }}">
                                <td>{{ $job->company_name }}</td>
                                <td>
                                    <img style="width:125px;height:100px;object-fit: contain;object-position: center;" src="{{ url('upload/employer/'.$job->company_logo) }}" />
                                </td>
                                <td>
                                    <a href="{{ $job->company_website }}" target="_blank">{{ $job->company_website }}</a>
                                </td>
                                <td>{{ $job->prefix }} {{ $job->first_name }} {{ $job->middle_name }} {{ $job->last_name }}</td>
                                <td>
                                    <?php if($job->status == 1){echo 'Active';}else{echo 'Deactivate';} ?>
                                </td>
                                <td>
                                    <a href="{{ route('auth.admin.applicants',[$job->id]) }}" class="btn btn-xs btn-warning">View All Jobs</a>
                                    <br/>
                                    <a href="{{ route('admin.job.show',[$job->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    <br/>
                                    <!-- <a href="{{ route('admin.job.edit',[$job->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a><br/> -->
                                    @can('job_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.job.destroy', $job->id])) !!}
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
        @can('job_delete')@endcan
    </script>
@endsection