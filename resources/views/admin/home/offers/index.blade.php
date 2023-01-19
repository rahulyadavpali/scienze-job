@extends('layouts.app')
@section('content')
    <h3 class="page-title">Home : OFFERING THE BEST DEALS</h3>
    <p>
        <a href="{{ route('admin.home.offers.create') }}" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create New Offer</a>
    </p>
    <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($offer as $offers)
                        <tr>
                            <td>
                                <img style="width:125px;height:100px;object-fit: contain;object-position: center;" src="{{ url('upload/icon/'.$offers->icon) }}" />
                            </td>
                            <td>{{ $offers->title }}</td>
                            <td>{!! $offers->description !!}</td>
                            <td>
                                @can('home_edit')
                                    <a href="{{ route('admin.home.offers.edit', [$offers->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                @endcan
                                @can('home_delete')
                                {!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE',
                                    'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                    'route' => ['admin.home.offers.delete', $offers->id])) !!}
                                {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
