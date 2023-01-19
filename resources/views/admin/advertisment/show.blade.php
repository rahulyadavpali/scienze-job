@extends('layouts.app')

@section('content')
    <h3 class="page-title">{{ $plans->plan_name }}</h3>
    <div class="panel panel-default">
        <div class="panel-heading">Details</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Plan Name</th>
                            <td>{{ $plans->plan_name }}</td>
                        </tr>
                        <tr>
                            <th>Plan Description</th>
                            <td>{!! $plans->plan_description !!}</td>
                        </tr>
                        <tr>
                            <th>Posting Location</th>
                            <td>{!! $plans->location !!}</td>
                        </tr>
                        <tr>
                            <th>Plan Price</th>
                            <td>{{ $plans->plan_price }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('admin.advertisment.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
