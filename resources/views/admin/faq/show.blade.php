@extends('layouts.app')
@section('content')
    <h3 class="page-title">FAQ Detail</h3>
    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_view')</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.information.fields.title')</th>
                            <td>{{ $faq->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.information.fields.description')</th>
                            <td>{!! $faq->description !!}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('admin.faq.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop