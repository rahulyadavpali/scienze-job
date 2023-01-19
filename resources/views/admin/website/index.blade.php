@extends('layouts.app')

@section('content')
    <h3 class="page-title">Website Data</h3>
    <p>
        <a href="{{ route('admin.website.create') }}" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Website</a>
    </p>
    <div class="panel panel-default">
        <div class="panel-heading">List</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Website Name</th>
                        <th>Link</th>
                        <th>Logo</th>
                        <th>Main Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($website) > 0)
                        @foreach ($website as $plans)
                            <tr>
                                <td>{{ $plans->name }}</td>
                                <td>{{ $plans->link }}</td>
                                <td>
                                    <img style="width:300px;height: 150px;object-fit: contain;object-position: center;background-color: #ffffff;" src="{{ url('upload/websites-logo/'.$plans->logo) }}" />
                                </td>
                                <td>{{ $plans->main_url }}</td>
                                <td>
                                    <a href="{{ route('admin.website.edit', [$plans->id]) }}" class="btn btn-warning">Edit</a>
                                    @can('home_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.website.destroy', $plans->id])) !!}
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
