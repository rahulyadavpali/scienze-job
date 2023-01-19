@extends('layouts.app')

@section('content')
    <h3 class="page-title">Home Page Banner</h3>
    <div class="panel panel-default">
        <div class="panel-heading">Details</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Plan Title</th>
                            <td>{{ $plans->plan_title }}</td>
                        </tr>
                        <tr>
                            <th>Plan Price</th>
                            <td>{!! $plans->plan_price !!}</td>
                        </tr>
                        <tr>
                            <th>Plan Description</th>
                            <td>{!! $plans->plan_description !!}</td>
                        </tr>
                        <tr>
                            <th>Meta Title</th>
                            <td>{{ $plans->meta_title }}</td>
                        </tr>
                        <tr>
                            <th>Meta Description</th>
                            <td>{{ $plans->meta_description }}</td>
                        </tr>
                        <tr>
                            <th>Meta Keyword</th>
                            <td>{{ $plans->meta_keywords }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('admin.plan.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
