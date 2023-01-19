@extends('layouts.app')

@section('content')
    <h3 class="page-title">Subscription Plan</h3>
    <p>
        <a href="{{ route('admin.plan.create') }}" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create New Plan</a>
    </p>
    <div class="panel panel-default">
        <div class="panel-heading">List</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Plan Title</th>
                        <th>Price</th>
                        <th>Meta Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($plan) > 0)
                        @foreach ($plan as $plans)
                            <tr>
                                <td>{{ $plans->plan_title }}</td>
                                <td>{!! $plans->plan_price !!}</td>
                                <td>{{ $plans->meta_title }}</td>
                                <td>
                                    <a href="{{ route('admin.plan.show', [$plans->id]) }}" class="btn btn-success">View Detail</a>
                                    <a href="{{ route('admin.plan.edit', [$plans->id]) }}" class="btn btn-warning">Edit</a>
                                    @can('home_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.plan.destroy', $plans->id])) !!}
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
