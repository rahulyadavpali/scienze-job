@extends('layouts.app')

@section('content')
    <h3 class="page-title">Advertisment Plans</h3>
    <div class="panel panel-default">
        <div class="panel-heading">List</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Plan Name</th>
                        <th>Plan Location</th>
                        <th>Plan Description</th>
                        <th>Final Plan Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($plan) > 0)
                        @foreach ($plan as $plans)
                            <tr>
                                <td>{{ $plans->plan_name }}</td>
                                <td>{{ $plans->location }}</td>
                                <td>{!! $plans->plan_description !!}</td>
                                <td>{{ $plans->plan_price }}</td>
                                <td>
                                    <a href="{{ route('admin.advertisment.show', [$plans->id]) }}" class="btn btn-success">View Detail</a>
                                    <a href="{{ route('admin.advertisment.edit', [$plans->id]) }}" class="btn btn-warning">Edit</a>
                                    @can('home_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.advertisment.destroy', $plans->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-danger')) !!}
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
