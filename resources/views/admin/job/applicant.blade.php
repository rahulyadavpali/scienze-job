@extends('layouts.app')

@section('content')
    <h3 class="page-title">View Jobs</h3>
    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_list')</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Advertisement Copy</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Salary</th>
                        <th>Number Of Posts</th>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Selection of job by Designation</th>
                        <th>Status</th>
                        <th>No. Of Applicants</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($applicant) > 0)
                        @foreach ($applicant as $job)
                            <tr>
                                <td>
                                    <p><strong>{{ $job->job_title }}</strong></p>
                                </td>
                                <td>
                                    <img style="width:125px;height:100px;object-fit: contain;object-position: center;" src="{{ url('upload/advertisement-copy/'.$job->copy) }}" />
                                </td>
                                <td>{{ $job->email }}</td>
                                <td>{{ $job->location }}</td>
                                <td>{{ $job->salary }}</td>
                                <td>
                                    <p><strong>{{ $job->post_no }}</strong></p>
                                </td>
                                <td>
                                    <?php $category = DB::table('category')->where('id', '=', $job->categories)->get(); ?>
                                    {{ $category[0]->title }}
                                </td>
                                <td>
                                    <?php $subcategory = DB::table('sub_category')->where('id', '=', $job->subcategories)->get(); ?>
                                    {{ $subcategory[0]->title }}
                                </td>
                                <td>{{ $job->selection_job }}</td>
                                <td><?php if($job->status == 1){echo 'Active';}else{echo 'Deactivate';} ?></td>
                                <td><?php if($job->status == 1){echo 'Active';}else{echo 'Deactivate';} ?></td>
                                <td>
                                    <a href="{{ route('admin.job.show',[$job->id]) }}" class="btn btn-xs btn-warning">View Applicants</a><br/>
                                    @can('job_view')
                                        <a href="{{ route('admin.job.show',[$job->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a><br/>
                                    @endcan
                                    @can('job_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.job.deletes', $job->id])) !!}
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
